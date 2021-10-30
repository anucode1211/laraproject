<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">Employee Add</div>

                    <div class="card-body">
                     <form action="#" method="get" @submit="addEmployee()">
                     <div class="form-group">
                        <lable for="name" >Name</lable>
                        <input type="text" name="name" v-model="name"  class="form-control">
                     </div>
                     <div class="form-group">
                        <lable for="email">Email</lable>
                        <input type="text" name="email" v-model="email" class="form-control">
                     </div>
                     <div class="form-group">
                        <lable for="contact">Contact</lable>
                        <input type="text" name="contact" v-model="contact"  class="form-control">
                     </div>
                     <div class="form-group">
                        <lable for="address">Address</lable>
                        <input type="text" name="address" v-model="address"class="form-control">
                     </div>
                     <div class="form-group">
                        <lable for="pancardno">PAN card</lable>
                        <input type="text" name="pancardno" v-model="pancardno"  class="form-control">
                     </div>
                     <div class="form-group">
                        <button type="submit" value="add Employee" class="btn btn-primary" > Add </button>
                     </div>

                     </form>
                    </div>
                </div>
            </div>
      </div>
    </div>
</template>

<script>
    export default {
        
        data(){
            return{
                form:{
                name: '',
                email: '',
                contact: '',
                address: '',
                pancardno: ''
                }
            }
        },
    
        mounted() {
             if (!User.loggedIn()) {
                this.$router.push({ name:'/' })
            }
        },
        methods:{
            addEmployee(){

                 axios.get('/api/employee/',this.form)
                    .then(() => {
                        this.$router.push({ name: 'employee' })
                        Notification.success()
                    })
                    .catch(error => this.errors = error.response.data.errors)

                },
            }
        }

</script>
