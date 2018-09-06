
<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Ба қафо</router-link>
        </div>

       <div class="col-sm-8 my-auto">
            <div >Иловаи саволи нав</div>
           
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Савол</label>
                            <input type="text" v-model="question.savol" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Категория</label>
                            <input type="text" v-model="question.kategoriya" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Варианти А</label>
                            <input type="text" v-model="question.variant_A" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Варианти B</label>
                            <input type="text" v-model="question.variant_B" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Варианти C</label>
                            <input type="text" v-model="question.variant_C" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Варианти D</label>
                            <input type="text" v-model="question.variant_D" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Ҷавоб</label>
                            <input type="text" v-model="question.javob" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Илова кардан</button>
                        </div>
                    </div>
                </form>
           
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                question: {
                    savol: '',
                    kategoriya: '',
                    variant_A: '',
                    variant_B: '',
                    variant_C: '',
                    variant_D: '',
                    javob: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newQuestion = app.question;
                axios.post('/api/v1/questions', newQuestion)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your question");
                    });
            }
        }
    }
</script>
