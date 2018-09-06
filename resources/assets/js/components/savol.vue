<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button @click="initAddSavol()" class="btn btn-primary btn-xs pull-right">
                            + Иловаи саволи нав
                        </button>
                       Руйхати саволҳо
                    </div>
 
                    <div class="panel-body">
                        <table class="table table-bordered table-striped table-responsive" v-if="savolho.length > 0">
                            <tbody>
                            <tr>
                                <th>
                                    №
                                </th>
                                <th>
                                    Савол
                                </th>
                                <th>
                                    Ҷавоб
                                </th>
                                <th>
                                    Амалиёт
                                </th>
                            </tr>
                            <tr v-for="(str, index) in savolho">
                                <td>{{ index + 1 }}</td>
                                <td>
                                    {{ str.nomi_savol }}
                                </td>
                                <td>
                                    {{ str.javob }}
                                </td>
                                <td>
                                    <button @click="initUpdate(index)" class="btn btn-success btn-xs">Таҳрир</button>
                                   <button @click="deleteSavol(index)" class="btn btn-danger btn-xs">Хориҷ</button>

                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
 
        <div class="modal fade" tabindex="-1" role="dialog" id="add_task_model">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Пушидан"><span
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
                            <label for="nomi_savol">Савол:</label>
                            <input type="text" name="nomi_savol" id="nomi_savol" placeholder="Task Name" class="form-control"
                                   v-model="savol.nomi_savol">
                        </div>
                        <div class="form-group">
                            <label for="savol">Категория:</label>
                            <input type="text" name="category" id="category" placeholder="Категория" class="form-control"
                                   v-model="savol.category">
                        </div>
                        <div class="form-group">
                            <label for="savol">Варианти А:</label>
                            <input type="text" name="varA" id="varA" placeholder="" class="form-control"
                                   v-model="savol.varA">
                        </div>
                        <div class="form-group">
                            <label for="savol">Варианти B:</label>
                            <input type="text" name="varB" id="varB" placeholder="" class="form-control"
                                   v-model="savol.varB">
                        </div>
                        <div class="form-group">
                            <label for="savol">Варианти C:</label>
                            <input type="text" name="varC" id="varC" placeholder="" class="form-control"
                                   v-model="savol.varC">
                        </div>
                         <div class="form-group">
                            <label for="savol">Варианти D:</label>
                            <input type="text" name="varD" id="varD" placeholder="" class="form-control"
                                   v-model="savol.varD">
                        </div>
                        <div class="form-group">
                            <label for="javob">Ҷавоб:</label>
                            <textarea name="javob" id="javob" cols="30" rows="5" class="form-control"
                                      placeholder="Ҷавоб" v-model="savol.javob"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Пушидан</button>
                        <button type="button" @click="createSavol" class="btn btn-primary">Сабт</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
 
        <div class="modal fade" tabindex="-1" role="dialog" id="update_task_model">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Пушидан"><span
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
                            <label>Савол:</label>
                          <input type="text" name="nomi_savol" id="nomi_savol" placeholder="Task Name" class="form-control"
                                   v-model="update_savol.nomi_savol">
                                  
                        </div>

                        <div class="form-group">
                            <label for="savol">Категория:</label>
                            <input type="text" name="category" id="category" placeholder="Категория" class="form-control"
                                   v-model="update_savol.category">
                        </div>
                        <div class="form-group">
                            <label for="savol">Варианти А:</label>
                            <input type="text" name="varA" id="varA" placeholder="" class="form-control"
                                   v-model="update_savol.varA">
                        </div>
                        <div class="form-group">
                            <label for="savol">Варианти B:</label>
                            <input type="text" name="varB" id="varB" placeholder="" class="form-control"
                                   v-model="update_savol.varB">
                        </div>
                        <div class="form-group">
                            <label for="savol">Варианти C:</label>
                            <input type="text" name="varC" id="varC" placeholder="" class="form-control"
                                   v-model="update_savol.varC">
                        </div>
                         <div class="form-group">
                            <label for="savol">Варианти D:</label>
                            <input type="text" name="varD" id="varD" placeholder="" class="form-control"
                                   v-model="update_savol.varD">
                        </div>
                        <div class="form-group">
                            <label for="javob">Javob:</label>
                            <textarea cols="30" rows="5" class="form-control"
                                      placeholder="Task Description" v-model="update_savol.javob"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Пушидан</button>
                        <button type="button" @click="updateSavol" class="btn btn-primary">Сабт</button>
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
                savol: {
                    nomi_savol: '',
                    javob: ''
                },
                errors: [],
                savolho: [],
                
                update_savol: {}
            }
        },
        mounted()
        {
            this.readSavol();
        },
        methods: {
            initAddSavol()
            {
                $("#add_task_model").modal("show");
            },
            createSavol()
            {
                axios.post('/savol', {
                    nomi_savol: this.savol.nomi_savol,
                    javob: this.savol.javob,
                })
                    .then(response => {
 
                        this.reset();
 
                        this.savolho.push(response.data.savol);
 
                        $("#add_task_model").modal("hide");
 
                    })
                    .catch(error => {
                        alert(error);
                        // this.errors = [];
                        //  if (error.response.data.errors.savol) {
                        //      this.errors.push(error.response.data.errors.savol[0]);
                        //  }
 
                        //  if (error.response.data.errors.javob) {
                        //      this.errors.push(error.response.data.errors.javob[0]);
                        //  }
                    });
            },
            reset()
            {
                this.savol.nomi_savol = '';
                this.savol.javob = '';
            },
            readSavol()
            {
                axios.get('/savol')
                    .then(response => {
 
                        this.savolho = response.data.savolho;
 
                    });
            },
            initUpdate(index)
            {
                this.errors = [];
                $("#update_task_model").modal("show");
                this.update_savol = this.savolho[index];
            },
            updateSavol()
            {
                axios.patch('/savol/' + this.update_savol.id, {
                    nomi_savol: this.update_savol.nomi_savol,
                    javob: this.update_savol.javob,
                })
                    .then(response => {
 
                        $("#update_task_model").modal("hide");
 
                    })
                    .catch(error => {
                        this.errors = [];
                        console.log(error.response);
                       
                    });
            },

               deleteSavol(index)
            {
                let conf = confirm("Оё Шумо ин саволро хориҷ намудан мехоҳед?");
                if (conf === true) {
   
                    axios.delete('/savol/' + this.savolho[index].id)
                        .then(response => {
 
                            this.savolho.splice(index, 1);
 
                        })
                        .catch(error => {
 
                        });
                }
            },
        }
    }
</script>