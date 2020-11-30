<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <p>{{user.name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props :['data'],
        created(){
          this.loadData();
        },
        methods : {
            loadData(){
                console.log('sss');
            }
        }
        
    }
    
</script>
