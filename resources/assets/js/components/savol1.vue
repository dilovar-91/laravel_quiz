<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button @click="initAddSavol()" class="btn btn-primary btn-xs pull-right">
                            + Add New Task
                        </button>
                        My Tasks
                    </div>
 
                    <div class="panel-body">
                        <table class="table table-bordered table-striped table-responsive" v-if="savol.length > 0">
                            <tbody>
                                <tr>
                                    <th>
                                        No.
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Description
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                <tr v-for="(task, index) in savol">
                                    <td>{{ index + 1 }}</td>
                                    <td>
                                        {{ task.savol }}
                                    </td>
                                    <td>
                                        {{ task.javobi_durust }}
                                    </td>
                                    <td>
                                        <button class="btn btn-success btn-xs">Edit</button>
                                        <button class="btn btn-danger btn-xs">Delete</button>
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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Add New Task</h4>
                    </div>
                    <div class="modal-body">
 
                        <div class="alert alert-danger" v-if="errors.length > 0">
                            <ul>
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>
 
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" placeholder="Task Name" class="form-control"
                                   v-model="task.name">
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control"
                                      placeholder="Task Description" v-model="task.description"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" @click="Addsavol" class="btn btn-primary">Submit</button>
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
                    savol: '',
                    javobi_durust: ''
                },
                errors: []
            }
        },
        methods: {
            initAddSavol()
            {
                this.errors = [];
                $("#add_task_model").modal("show");
            },
            Addsavol()
            {
                axios.post('/savolho', {
                    savol: this.savol.savol,
                    javobi_durust: this.savol.javobi_durust,
                })
                    .then(response => {

                        this.reset();

                        $("#add_task_model").modal("hide");

                    })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.savol) {
                            this.errors.push(error.response.data.errors.savol[0]);
                        }

                        if (error.response.data.errors.javobi_durust) {
                            this.errors.push(error.response.data.errors.javobi_durust[0]);
                        }
                    });
            },
            reset()
            {
                this.savol.savol = '';
                this.savol.javobi_durust = '';
            },
        }
    }
</script>