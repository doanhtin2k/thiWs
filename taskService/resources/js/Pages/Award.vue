<template>
    <Head title="Award" />

    <div class="w-full relative flex flex-wrap mx-auto py-4 mt-5">
        <h1 class="w-full text-center text-2xl font-bold px-4">Thông tin giải thưởng</h1>
        <table class="w-full">
           <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Award giver</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <template v-for="award in awards">
                    <tr>
                        <td class="text-center py-2">{{award.name}}</td>
                        <td class="text-center py-2">{{award.description}}</td>
                        <td class="text-center py-2">{{award.award_giver}}</td>
                        <td class="text-center py-2">{{award.salary}}</td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>
<script>
    import JetButton from '@/Jetstream/Button.vue'
    import JetInput from '@/Jetstream/Input.vue'
    import JetLabel from '@/Jetstream/Label.vue'
    import axios from 'axios'

    export default ({
        components: {
            JetButton,
            JetInput,
            JetLabel,
        },
        data() {
            return {
            }
        },
        methods: {
        },
        props:  {
            awards: Array,
            }
    })
</script>