<template>
    <Head title="Welcome" />

    <div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0">
        <h1>Đơn xin trao giải thưởng</h1>
        <div>
            <form>
                <div>
                    <jet-label for="receiver" value="Kính gửi" />
                    <jet-input id="receiver" class="mt-1 block w-full" v-model="form.receiver" required autofocus></jet-input>
                </div>
                <div>
                    <jet-label for="receiver" value="Kính gửi" />
                    <jet-input id="receiver" class="mt-1 block w-full" v-model="form.receiver" required autofocus></jet-input>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
    import { Head, Link } from '@inertiajs/inertia-vue3';
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetLabel from '@/Jetstream/Label.vue'

    export default ({
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


            }
        },
    })
</script>