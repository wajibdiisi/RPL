<style scoped>
body {
            background: #071224;

        }
.card {
    border-radius: 6px;
    background-color: #131f39;
    margin-bottom: 20px;
    box-shadow: 0 25px 20px -21px rgba(0,0,0,0.57);
    margin-top:30px;
}
.card-background {
    position: relative;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
}
.card-background .image {
    border-radius: 6px;
}
.card .image {
    width: 100%;
    overflow: hidden;
    height: 260px;
    border-radius: 6px 6px 0 0;
    position: relative;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    transform-style: preserve-3d;
}
.card .image img {
    width: 100%;
    height : 100%;
}

.card-background .filter {
    opacity: 0.20;
    filter: alpha(opacity=20.00000000000001);
    border-radius: 6px;
}
.card .filter {
    position: absolute;
    z-index: 2;
    background-color: rgba(0, 0, 0, 0.68);
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    text-align: center;
}
.card-background:hover .filter {
    opacity: 0.65;
    cursor : pointer;
    filter: alpha(opacity=65);
}
.card-background .content, .card-background .footer {
    position: absolute;
    z-index: 3;
    top: 0;
    left: 0;
    width: 100%;
}
.card .content {
    padding: 15px 15px 10px 15px;
}
.card-background .price {
    margin: 0;
    color: #ffffff;
    font-weight:normal;
}
.card-background .title {
    margin-top: 30px;
    font-weight: 400;
}
.card-background .title, .card-background .stats, 
.card-background .category, 
.card-background .description, 
.card-background small, .card-background a {
    color: #ffffff;
}
.card .title {
    margin: 0 0 10px 0;
    color: #333333;
    font-weight: 300;
}
.card-background .footer {
    bottom: 0;
    top: auto;
    padding: 10px 15px;
    width: 100%;
    line-height: 40px;
    color: #ffffff;
}
.card .footer div {
    display: inline-block;
}
.card .author {
    font-size: 12px;
    text-transform: uppercase;
}
.card-background img {
  max-height : 100%
}

</style>
<template>
<div class="card">
   <h3 class="mt-3 text-center text-light"> {{single_collection.profile_id}}'s {{single_collection.collection_name}}  <button v-if ="profile === currentUser" class="btn btn-outline-danger" @click="deleteCollection(single_collection._id)" ><i class="fas fa-trash"></i></button> </h3>
 <div class="row">
 <template v-for = "game in single_collection.game">
  <div class="col-md-4 offset-md-1 mb-3" :key="game.id">
       <div class="card card-background">
            <div  @click ="ref_game(game.custom_url)"   class="image" style="background-image: url(https://via.placeholder.com/266x200/87CEEB); background-size: cover; background-position: 50% 50%;">
            <img class="img-fluid" :src="'/uploads/gamePicture/' + game.gamePicture">
                <div class="filter"></div>
            </div>
             <div class="content">
                <h5 class="price">{{game.gameName}}
                  <button v-if = "profile === currentUser" class="btn btn-outline-danger float-right" @click="deleteData(game._id)" ><i class="fas fa-trash"></i></button>
                 </h5> 
            </div>
        </div>
    </div>
  </template>

</div>
</div>
</template>


<script>
export default {
  data() {
    return {
      // variable array yang akan menampung hasil fetch dari api
      single_collection: [],
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
      let uri = `/api/get_collection/${this.$route.params.collection_id}`;
      // fetch data dari api menggunakan axios
      this.$http.get(uri).then((response) => {
            this.single_collection = response.data;
        });
    },
    deleteCollection($id){
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
        this.$router.push("/profile/" + this.$route.params.id + "/gameCollection/all");
                    });
                    this.$swal({
                    background: '#111D35',
                    title : 'Deleted!',
                    text : 'Your Collection has been deleted!',
                    icon : 'success',
                    }
                    )
                }
            })
     
  },
    deleteData($id){
      
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
                      
     this.$http.delete("/api/delete_fromCollection/" + this.$route.params.collection_id + "/delete/" + $id).then(response => {
        this.loadData();
                    });
                    this.$swal(
                    'Deleted!',
                    'This game has been deleted from Collection!',
                    'success'
                    )
                }
            })
    
    }
  }
}

</script>

<!-- script js 
<script>
export default {
  data() {
    return {
      // variable array yang akan menampung hasil fetch dari api
      persons: []
    };
  },
  created() {
    this.loadData();
  },
  methods: {
    loadData() {
      // fetch data dari api menggunakan axios
      axios.get("http://localhost:8000/api/person").then(response => {
        // mengirim data hasil fetch ke varibale array persons
        this.persons = response.data;
      });
    },
    deleteData(id) {
      // delete data
      axios.delete("http://localhost:8000/api/person/" + id).then(response => {
        this.loadData();
      });
    }
  }
};
</script> -->