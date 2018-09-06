
<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createQuestion'}" class="btn btn-success">Иловаи саволи нав</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Рӯйхати саволҳо</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Савол</th>
                        <th>Категория</th>
                        <th>Варианти 1</th>
                        <th>Варианти 2</th>
                        <th>Варианти 3</th>
                        <th>Варианти 4</th>
                        <th>Ҷавоб</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="question, index in questions">
                        <td>{{ question.savol }}</td>
                        <td>{{ question.kategoriya }}</td>
                        <td>{{ question.varant_A }}</td>
                        <td>{{ question.varant_B }}</td>
                        <td>{{ question.varant_C }}</td>
                        <td>{{ question.varant_D }}</td>
                        <td>{{ question.javob }}</td>
                        <td>
                            <router-link :to="{name: 'editQuestion', params: {id: question.id}}" class="btn btn-xs btn-default">
                                Таҳрир
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(question.id, index)">
                                Хориҷ
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                questions: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/questions')
                .then(function (resp) {
                    app.questions = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load questions");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/questions/' + id)
                        .then(function (resp) {
                            app.questions.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete question");
                        });
                }
            }
        }
    }
</script>
