<template>
    <Head title="Welcome" />

    <div class="w-1/2 relative flex flex-wrap mx-auto py-4" v-if="!event">
        <h1 class="w-full text-center text-2xl font-bold">Đơn xin trao giải thưởng</h1>
        <div class="w-full">
            <form @submit.prevent = "submitTask">
                <div class="py-2">
                    <jet-label class="text-black" for="receiver" value="Người nhận" />
                    <jet-input id="receiver" class="mt-1 block w-full border-b-2 border-black border-dotted" v-model="form.receiver"></jet-input>
                </div>
                <div class="py-2">
                    <h2 class="py-2 font-bold">Thông tin sinh viên</h2>
                    <div class="w-full">
                        <div class="w-full flex flex-wrap pb-4">
                            <div class="w-1/2 pr-4">
                                <jet-label for="name" value="Họ và Tên" class="text-black" />
                                <jet-input id="name" class="mt-1 block w-full border-b-2 border-black border-dotted" v-model="form.name"></jet-input>
                            </div>
                            <div class="w-1/2 pl-2">
                                <jet-label for="phone" value="Số điện thoại" class="text-black" />
                                <jet-input id="phone" class="mt-1 block w-full border-b-2 border-black border-dotted" v-model="form.phone"></jet-input>
                            </div>
                        </div>
                        <div class="w-full flex flex-wrap pb-4">
                            <div class="w-1/2 pr-2">
                                <jet-label for="masv" value="Mã sinh viên" class="text-black" />
                                <jet-input id="masv" class="mt-1 block w-full border-b-2 border-black border-dotted" v-model="form.masv"></jet-input>
                            </div>
                            <div class="w-1/2 pl-2">
                                <jet-label for="email" value="Email" class="text-black" />
                                <jet-input id="email" class="mt-1 block w-full border-b-2 border-black border-dotted" v-model="form.email"></jet-input>
                            </div>
                        </div>
                        <div class="w-full flex flex-wrap pb-4">
                            <div class="w-1/2 pr-2">
                                <jet-label for="address" value="Nơi ở hiện tại" class="text-black" />
                                <jet-input id="address" class="mt-1 block w-full border-b-2 border-black border-dotted" v-model="form.address"></jet-input>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="py-2 font-bold">Thông tin sự kiện</h2>
                <div class="py-2">
                    <jet-label class="text-black" for="event_name" value="Tên sự Kiện" />
                    <jet-input id="event_name" class="mt-1 block w-full border-b-2 border-black border-dotted" v-model="form.event_name"></jet-input>
                </div>
                <div class="py-2">
                    <jet-label class="text-black" for="note" value="Ghi chú" />
                    <textarea id="note" class="mt-1 block w-full" v-model="form.note"></textarea>
                </div>
                <div class="py-2 flex justify-end">
                    <jet-button>Save</jet-button>
                </div>
            </form>
        </div>
    </div>
    <!-- <Event v-if="event" :event="event" :masv="form.masv"></Event> -->

    <div>
        <loading
            v-model:active="isLoading"
            :can-cancel="false"
            :is-full-page="true"
            :color="`#3EDBE5`"
            :loader="`bars`"
        />
    </div>

</template>
<script>
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import Event from '@/Pages/Event.vue'
    import axios from 'axios'
    import Loading from 'vue-loading-overlay';
    import 'vue-loading-overlay/dist/vue-loading.css';

    export default ({
        components: {
            JetButton,
            JetInput,
            JetLabel,
            Event,
            Loading,
        },
        data() {
            return {
                form: this.$inertia.form({
                    receiver: '',
                    masv:'',
                    email:'',
                    phone:'',
                    name:'',
                    event_name:'',
                    note:'',
                    address:'',
                }),
                event:null,
                isLoading: false,
                messages:[],
            }
        },
        created() {
            console.log("ddd");
            Echo.channel("channel-name").listen("DemoEvent", e => {
                console.log('Event listen Demo');
                console.log(e.message);
                this.messages.push(e.message);
                this.$toast.success(e.message, {
                    position: 'top-right'
                })
            });
        },
        methods: {
             async submitTask(){
                 this.isLoading = true;
                 //await axios.post("/task",{this.form}).then
                await axios.post("/task",this.form)
                .then(res => {
                    
                    console.log(res);
                    // this.getEventByName();
                    if(res.data == true)
                    {
                        this.$toast.success("Trao giải thưởng thành công. kết thúc quá trình", {
                            position: 'top-right'
                        })
                    }else{
                        this.$toast.error("Trao giải thưởng Thất bại. Kết thúc quá trình", {
                            position: 'top-right'
                        })
                    }
                    this.isLoading = false;
                })
                .catch(err => {
                    console.error(err); 
                })
                // this.getEventByName();
                
            },
            // async getEventByName(){
            //     //  await axios.post("/task",{this.form}).then
            //     await axios.post("http://localhost:3001/api/event/calender", this.form)
            //     .then(res => {
            //         console.log(res);
            //         this.event = res.data;
            //         this.isLoading = false;
            //     })
            //     .catch(err => {
            //         console.error(err); 
            //     })
            // },
        },
    })
</script>