<template>
    <div class="columns">
        <div class="column is-half is-offset-one-quarter quest-list">
            <div class="box">
                <h2 class="title">My Question</h2>
                <hr>
                <div class="field has-addons">
                    <div class="contr   ol is-expanded">
                        <input class="input" type="text" placeholder="New question" v-model="quest.savol">
                    </div>
                    <div class="control">
                        <a class="button is-primary" @click="createQuest()">
                            Add quest
                        </a>
                    </div>
                </div>
<div class="tabs is-centered">
                    <ul>
                        <li :class="{'is-active':isActive('current')}">
                            <h3 class="title">
                                <a href="#" v-on:click.prevent="fetchQuestList()">
                                    Current quest
                                </a>
                            </h3>
                        </li>
                        <li :class="{'is-active':isActive('javob')}">
                            <h3 class="title">
                                <a href="#" v-on:click.prevent="fetchQuestList(1)">
                                    Archived Quests
                                </a>
                            </h3>
                        </li>
                    </ul>
                </div>
                <div class="card" v-for="quest in list">
                    <header class="card-header">
                        <p class="card-header-title">
                        Саволи  {{ quest.id }}
                        </p>
                        <a href="#" class="card-header-icon" aria-label="more options"
                            v-on:click.prevent="javobQuest(quest.id)">
                            <span class="icon">
                                <i class="fa " :class="{'fa-square-o': !quest.javob,check: !quest.javob, 'fa-check-square-o': quest.javob, done: quest.javob}" aria-hidden="true"></i>
                            </span>
                        </a>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <p v-if="quest !== editingQuest" @dblclick="editQuest(quest)" v-bind:title="message">
                                {{ quest.savol }}
                            </p>
                            <input class="input" v-if="quest === editingQuest" v-autofocus @keyup.enter="endEditing(quest)" @blur="endEditing(quest)" type="text" placeholder="New quest" v-model="quest.savol">
                        </div>
                    </div>
                    <footer class="card-footer">
                        <a class="card-footer-item" v-on:click.prevent="deleteQuest(quest.id)">Удалить</a>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        directives: {
            'autofocus': {
                inserted(el) {
                    el.focus();
                }
            }
        },
        data() {
            return {
                message: 'Double click for editing.',
                list: [],
                quest: {
                    id: '',
                    savol: '',
                    javob: ''
                },
                editingQuest: {},
                activeItem: 'current'
            }
        },
        created() {
            this.fetchQuestList();
        },
        methods: {
            fetchQuestList(javob = null) {
               // if (javob === null) {
                    var url = 'current_quests';
               //     this.setActive('current');
               // } else {
                //    var url = 'javob_quests';
                   // this.setActive('javob');
                //}
                axios.get(url).then(result => {
                    this.list = result.data
                });
            },
            isActive(menuItem) {
                return this.activeItem === menuItem;
            },
            setActive(menuItem) {
                this.activeItem = menuItem;
            },
            createQuest() {
                axios.post('create_quest', this.quest).then(result                        => {
                    this.quest.savol = '';
                    this.fetchQuestList();
                }).catch(err => {
                    console.log(err);
                });
            },
            editQuest(quest) {
                this.editingQuest = quest;
            },
            endEditing(quest) {
                this.editingQuest = {};
                if (quest.savol.trim() === '') {
                    this.deleteQuest(quest.id);
                } else {
                    axios.post('edit_quest', quest).then(result => {
                        console.log('access!')
                    }).catch(err => {
                        console.log(err);
                    });
                }
            },
            deleteQuest(id) {
                axios.post('delete_quest/' + id).then(result => {
                    this.fetchQuestList();
                }).catch(err => {
                    console.log(err);
                });
            },
            javobQuest(id) {
                axios.post('javob_quest/' + id).then(result => {
                    this.fetchQuestList();
                }).catch(err => {
                    console.log(err);
                });
            }
        }
    }
</script>