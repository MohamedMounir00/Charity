<template>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                Chat
            </div>
            <div class="card-body">
                <div class="list-messages" v-if='messages && messages.length'>
                    <div class="media" v-for='message in messages' :key='message.id'>
                        <div class="media-body">
                            <p><span style="color:red;"><strong>{{message.name}}</strong> :</span>{{message.body}}:<span>{{message.phone}}</span></p>
                        </div>
                    </div>
                </div>
                <div class="messages-not-found" v-else>Messages not found</div>
            </div>
            <div class="card-footer">
                <form @submit.prevent="sendMesaage()">

                <div style="display:flex;" class="form-group">
                    <input type="text" class="form-control" placeholder="type your chat" v-model='message' >
                    <input type="text" class="form-control" placeholder="type your chat" v-model='phone' >
                    <button type="submit" class="btn btn-xs btn-primary" >Create Post</button>

                </div>
                </form>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                messages:[],
                message:'',
                phone:'',
                name:$('.dropdown .dropdown-toggle').text()
            }
        },
        sockets:{
            connect:function(){
                console.log('Socket Connected')
            },
            message:function(val){
                this.getMessage();
            }
        },
        methods:{
            sendMesaage(){
                axios.post('/sendMessage',{name:this.name,body:this.message,phone:this.phone})
                    .then(response=>{
                    console.log(response);
            });
                this.messages.push();
                this.message='';
                this.phone='';
            },
            getMessage(){
                axios.get('/messages')
                    .then(response=>{
                    console.log(response);
                this.messages = response.data;
            });

            }
        },
        mounted() {
            this.getMessage();
        }
    }
</script>
