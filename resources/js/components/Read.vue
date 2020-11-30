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


</style>
<template>
  <div>
    
     <div class="row">
        <div class="col-md-12 card">
            <br>
            <br>
            <div class="row">
                <div class="col-md-12 col-sm-12 text-light">
                 <div v-if = "profile === currentUser">
                    <h4> Collection
                      <router-link class="btn btn-primary float-right" :to="{ name: 'create' }">+ Create New
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
                        
                        <h3><router-link :to="{ name : 'home' , params: {collection_id : collect._id } }">{{collect.collection_name}}</router-link></h3>
                            <h6> {{collect.description}}</h6>
                            <div class="col-md-12 row flex-nowrap">
                                <div v-for="(game,index_game) in collect.game" :key="index_game">
                                  <template v-if= "index_game < 6">
                                    <div class="card card-bloc m-0 mb-2">
                                  <div  @click ="ref_game(game.custom_url)">
                                   
                                       <img :src="'/uploads/gamePicture/' + game.gamePicture" style="max-width : 200px">
                                     
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