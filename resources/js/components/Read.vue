<script src="https://unpkg.com/vue-swal"></script>
<style scoped>
.card {
  background-color: #131f39;
}
.card img {
  
  width: 100%;
  height: 10vw;
  min-width : 150px;
  max-width : 200px;
  max-height : 10vw;
  border-radius: 6px 6px 6px 6px;
}
.card .click {
  cursor : pointer;
}
img:hover {
    opacity: 0.65;
    cursor : pointer;
    filter: alpha(opacity=65);
}
@media only screen and (max-width: 600px) {
  .card .card {
    display : block !important;
    } 
  .card img{
    max-height : 300px !important;
    max-width : 200px !important;
    height : 300px !important;
    width : 200px !important;
    
  }
  .d-flex{
    display : inline !important;

  }
  .card-block{
    left : 0px !important;
  }
  }


</style>
<template>
  <div>
    
     <div class="row">
        <div class="col-md-12 card">
            <br>
            <br>
            <div class="row">
                <div class="col-md-12 text-light">
                 <div v-if = "profile === currentUser">
                    <h4> Collection
                      <router-link class="btn btn-outline-primary float-right" :to="{ name: 'create' }">+ Create New
                        </router-link>
                    </h4>
                    </div>
                <div v-else>
                  <h4> Collection
                       <router-link class="btn btn-primary float-right" :to="{ name: 'create' }">View Profile
                        </router-link>
                    </h4>
                  </div>
                    <div>
                        <div v-for="(collect,index) in collection" :key="index">
                        
                        <h3><router-link :to="{ name : 'home' , params: {collection_id : collect._id } }">{{collect.collection_name}} ({{collect.game.length}})</router-link> <button v-if ="profile === currentUser" class="btn btn-outline-danger" @click="delete_collection(collect._id)" ><i class="fas fa-trash"></i></button></h3>
                            <h6> {{collect.description}}</h6>
                            <div class="col-md-12 d-flex flex-nowrap">
                                <div v-for="(game,index_game) in collect.game" :key="index_game">
                                  <template v-if= "index_game === 0">
                                    <div class="card m-0 mb-2" style="z-index : 10 ">
                                  <div  @click ="ref_game(game.custom_url)">
                                   
                                       <img :src="'/uploads/gamePicture/' + game.gamePicture" style="max-width : 150px">
                                     
                                  </div>
                                  </div>
                                  
                                   </template>
                                    <template v-if= "index_game  > 0 && index_game < 10 ">
                                       <div class="card card-block m-0 mb-2" style=" position: relative ;max-width : 200px" :style ="{ left : -index_game * 100 + 'px' , zIndex : 10 -  index_game }">
                                  <div  @click ="ref_game(game.custom_url)">
                                   
                                       <img :src="'/uploads/gamePicture/' + game.gamePicture">
                                     
                                  </div>
                                    </div>
                                      </template>
                                </div>

                            </div>
                        </div>
                    </div>


          </div>

        </div>
        <br>
        
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      // variable array yang akan menampung hasil fetch dari api
      collection: [],
      profile : this.$route.params.id,
      currentUser : this.$user
    };
  },
  created() {
    this.loadData();
  },
  methods: {
    delete_collection($id){
      this.$swal({
            background: '#111D35',
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!',
            closeOnCancel: true
            }).then((result) => {
                //send request to server 
                if (result.value) {
                      let uri = "/api/profile/" + this.$route.params.id + "/delete_collection/" + $id;
      this.$http.delete(uri).then((response) =>{
        this.loadData();
                    });
                    this.$swal(
                    'Deleted!',
                    'Your post has been deleted!',
                    'success'
                    )
                }
            })
     
  },
    ref_game($id){
      window.location.href = '/gamepage/' + $id
    },
    loadData() {
      let uri = `/api/profile/${this.$route.params.id}`;
      // fetch data dari api menggunakan axios
      this.$http.get(uri).then((response) => {
            this.collection = response.data;
        });
      
    },
    
  }
};
</script>