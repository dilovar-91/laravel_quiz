<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button @click="initAddQuestion()" class="btn btn-primary btn-xs pull-right">
                            + Иловаи саволи нав
                        </button>
                        Руйхати саволҳо
                    </div>
 
                    <div class="panel-body">
                        <table class="table table-bordered table-striped table-responsive" v-if="questions.length > 0">
                            <tbody>
                            <tr>
                                <th>
                                    №
                                </th>
                                <th>
                                    id
                                </th>
                                <th>
                                    Саволҳо
                                </th>
                                 <th>
                                    Варианти А
                                </th>
                                <th>
                                    Варианти В
                                </th>
                                  <th>
                                    Варианти С
                                </th>
                                  <th>
                                    Варианти D
                                </th>
                                <th>
                                    Варианти дураст
                                </th>
                                <th>
                                    Амалҳо
                                </th>
                            </tr>
                            <tr v-for="(question, index) in questions">
                                <td>{{ index + 1 }}</td>
                                 <td>
                                    {{ question.id_savol }}
                                </td>
                                <td>
                                    {{ question.savol }}
                                </td>

                                <td>
                                    {{ question.variant_A }}
                                </td>
                                  <td>
                                    {{ question.variant_B }}
                                </td>   
                                 <td>
                                    {{ question.variant_C }}
                                </td> 
                                <td>
                                    {{ question.variant_D }}
                                </td>
                                <td>
                                    {{ question.javob }}
                                </td>
                                <td>
                                    <button @click="initUpdate(index)" class="btn btn-success btn-xs">Таҳрир</button>
                                    <button class="btn btn-danger btn-xs">Хориҷ</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
 
        <div class="modal fade" tabindex="-1" role="dialog" id="add_question_model">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Иловаи саволи нав</h4>
                    </div>
                    <div class="modal-body">
 
                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>
 
                        <div class="form-group">
                            <label for="savol">Name:</label>
                            <input type="text" name="savol" id="savol" placeholder="Question Name" class="form-control"
                                   v-model="question.savol">
                        </div>
                        <div class="form-group">
                            <label for="javob">Description:</label>
                            <textarea name="javob" id="javob" cols="30" rows="5" class="form-control"
                                      placeholder="Question Description" v-model="question.javob"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" @click="createQuestion" class="btn btn-primary">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
 
        <div class="modal fade" tabindex="-1" role="dialog" id="update_question_model">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Таҳрири савол</h4>
                    </div>
                    <div class="modal-body">
 
                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>
 
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" placeholder="Question Name" class="form-control"
                                   v-model="update_question.savol">
                        </div>
                        <div class="form-group">
                            <label for="javob">Description:</label>
                            <textarea cols="30" rows="5" class="form-control"
                                      placeholder="Question Description" v-model="update_question.javob"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" @click="updateQuestion" class="btn btn-primary">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
 
    </div>
</template>
 
<script>
    export default {
        data(){
            return {
                question: {
                  //  id_savol: '',
                    savol: '',
                    javob: ''
                },
                errors: [],
                questions: [],
                update_question: {}
            }
        },
        mounted()
        {
            this.readQuestions();
        },
        methods: {
            initAddQuestion()
            {
                $("#add_question_model").modal("show");
            },
            createQuestion()
            {
                axios.post('/laravel_quiz/public/savolho/', {
                    //id_savol: this.question.id_savol,
                    savol: this.question.savol,
                    javob: this.question.javob,
                })
                    .then(response => {
 
                        this.reset();
 
                        this.questions.push(response.data.question);
 
                        $("#add_question_model").modal("hide");
 
                    })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.savol) {
                            this.errors.push(error.response.data.errors.savol[0]);
                        }
 
                        if (error.response.data.errors.javob) {
                            this.errors.push(error.response.data.errors.javob[0]);
                        }
                    });
            },
            reset()
            {
                this.question.savol = '';
                this.question.javob = '';
            },
            readQuestions()
            {
                axios.get('/laravel_quiz/public/savolho/')
                    .then(response => {
 
                        this.questions = response.data.questions;
 
                    });
            },
            initUpdate(index)
            {
                this.errors = [];
                $("#update_question_model").modal("show");
                this.update_question = this.questions[index];
            },
            updateQuestion()
            {
                axios.patch('/laravel_quiz/public/savolho/' + this.update_question.savol, {
                   // id_savol: this.update_question.id_savol,
                    savol: this.update_question.savol,
                    javob: this.update_question.javob,
                })
                    .then(response => {
 
                        $("#update_question_model").modal("hide");
 
                    })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.savol) {
                            this.errors.push(error.response.data.errors.savol[0]);
                        }
 
                        if (error.response.data.errors.javob) {
                            this.errors.push(error.response.data.errors.javob[0]);
                        }
                    });
            }
        }
    }
</script>