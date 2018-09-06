
<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.questionId = id;
            axios.get('/api/v1/questions/' + id)
                .then(function (resp) {
                    app.question = resp.data;
                })
                .catch(function () {
                    alert("Could not load your question")
                });
        },
        data: function () {
            return {
                questionId: null,
                question: {
                    savol: '',
                    kategori: '',
                    varianti_A: '',
                    varianti_B: '',
                    varianti_C: '',
                    varianti_D: '',
                    javob: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newQuestion = app.question;
                axios.patch('/api/v1/questions/' + app.questionId, newQuestion)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your question");
                    });
            }
        }
    }
</script>
