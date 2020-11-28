<style>
.card-container{
  display: flex;
	padding: 1rem 0rem;
  max-height : 400px;
  max-width : 300px;
	overflow: hidden;}
.card_body{
    flex: 1;
    transition: all 0.3s ease-in-out;
    background-color: #fff;
    padding: 15px;
    height : 230px;
    max-height : 230px;
    border-radius: 10px;
    box-shadow: 0px 2px 8px #9E9E9E;
}


</style>
<template>
  <div>
    <!-- disini saya menggunakan bootstrap untuk design tabel nya. secara default bootstrap sudah di include di file welcome.blade.php jadi saya tidak perlu lagi untuk import file nya -->
    <div class="row">
        <div class="col-md-12 card">
            <br>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <h4>Collection <router-link class="btn btn-primary float-right" to="/create">+ Create New
                        </router-link>
                    </h4>
                    <div class="row">
                        <div v-for="(collect,index) in collection" :key="index">
                        <h3>{{collect.collection_name}}<router-link :to="{ name : 'home' , params: {collection_id : collect._id } }">Google</router-link></h3>
                            <div class="col-md-6 mr-4 card-container">
                                <div v-for="(game,index_game) in collect.game" :key="index_game">
                                  <template v-if= "index_game < 3">
                                  <div v-if = "index_game === 0">
                                    <div class="card_body" tabindex="0">
                                        <h2 style="display:inline-block; max-width : 150px;overflow : hidden !important; text-overflow : ellipsis">{{game.gameName}}</h2>
                                       
                                    </div>
                                  </div>
                                  <div v-else>
                                  <div class="card_body" tabindex="0" style="margin-left : -60px; z-index : 10">
                                        <h2 style="display:inline-block; max-width : 150px;overflow : hidden !important; text-overflow : ellipsis">{{game.gameName}}</h2>
                                    </div>
                                  </div>
                                   </template>
                                    
                                </div>

                            </div>
                        </div>
                    </div>


          </div>

        </div>
        <div v-for = "collect in collection" :key ="collect._id">
          {{collect.profile_id}}
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
      collection: []
    };
  },
  created() {
    this.loadData();
  },
  methods: {
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