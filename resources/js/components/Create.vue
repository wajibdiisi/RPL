<script src="https://unpkg.com/vue-swal"></script>
<style scoped>
.card {
  background-color: #131f39;
}
.form-control {
    background-color : #131f39;
    border : none;
}
</style>
<script src="vuelidate/dist/vuelidate.min.js"></script>


<template>
  
        <div class="row justify-content-center text-light">
            <div class="col-md-12 card">
               
                    <div class="card-header">Create New Collection  <button type="button" class="close" aria-label="Close" @click="$router.go(-1)">
            <span aria-hidden="true">&times;</span>
        </button></div>
                <div class="card-body">
                     <form @submit.prevent="addData()">
                     <div class="form-group">
    <label for="exampleInputEmail1">Collection Name</label>
    <input type="text" class="form-control text-light"  id="name" v-model.trim="$v.name.$model" aria-describedby="emailHelp" placeholder="Enter Collection Name">
     </div>
     <div class="error text-danger" v-if="!$v.name.required">Field is required</div>
  <div class="error text-danger" v-if="!$v.name.minLength">Name must have at least {{$v.name.$params.minLength.min}} letters.</div>
 <tree-view :data="$v.name" :options="{rootObjectKey: '$v.name', maxDepth: 2}"></tree-view>
  
  
    <div class="form-group">
    <label for="exampleInputEmail1">Collection Description</label>
    <textarea class="form-control text-light" id="description" v-model.trim="$v.description.$model" aria-describedby="emailHelp" placeholder="Enter Collection Description" row ="3"></textarea>
    </div>
    <div class="error text-danger" v-if="!$v.description.required">Field is required</div>
   <div class="error text-danger" v-if="!$v.description.maxLength">Description must have at most {{$v.description.$params.maxLength.max}} letters.</div>
 
 
    <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>
        </div>
            </div>
        </div>
   
</template>

<script>
    import { required, minLength, maxLength, between } from 'vuelidate/lib/validators'
    export default {
        data(){
            return{
               name : '',
               description : '',
            }
        },
        validations: {
            name: {
                required,
                minLength :minLength(4)
            },
            description: {
                required,
                maxLength :maxLength(300),
            },
        },
        methods : {
            addData(){
                this.$v.$touch(); 
			if(this.$v.$error) return 
            
            
                this.$swal ({
                    background: '#111D35',
                    icon : "success",
                    title : "Collection Created",
                    button: {
                        text: "OK",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: true,
                    }
                });
            
                let uri = `/api/profile/${this.$route.params.id}`;
                this.$http.post("/api/profile/" + this.$route.params.id + "/new_collection",{
                    name : this.name,
                    description : this.description
                }).then(response => {
                    this.$router.push("/profile/" + this.$route.params.id + "/gameCollection/all");
                })
            }
        }
        
    }
    
</script>
