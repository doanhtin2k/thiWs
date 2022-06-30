<template>
    <Head title="Welcome" />

    <div class="w-3/4 relative flex flex-wrap mx-auto py-4">
        <div class="w-full">
            <h1 class="w-full text-center text-2xl font-bold px-4 py-5">Thông tin sinh viên</h1>
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-center">Name</th>
                        <th  class="text-center">masv</th>
                        <th  class="text-center">email</th>
                        <th  class="text-center">phone</th>
                        <th  class="text-center">birthday</th>
                        <th class="text-center">branch</th>
                        <th  class="text-center">class</th>
                        <th  class="text-center">Country</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="student">
                        <td class="text-center">{{student.name}}</td>
                        <td class="text-center">{{student.masv}}</td>
                        <td class="text-center">{{student.email}}</td>
                        <td class="text-center">{{student.phone}}</td>
                        <td class="text-center">{{student.birthday}}</td>
                        <td class="text-center">{{student.branch}}</td>
                        <td class="text-center">{{student.class}}</td>
                        <td class="text-center">{{student.country}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class='w-full'>
            <h1 class="w-full text-center text-2xl font-bold px-4 py-5">Thông tin Bang diem</h1>
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="text-center">Score 1</th>
                        <th  class="text-center">Score 2</th>
                        <th  class="text-center">Score 3</th>
                        <th  class="text-center">Score 4</th>
                        <th  class="text-center">Score 5</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-if="student">
                        <td class="text-center">{{student.transcripts.score_1}}</td>
                        <td class="text-center">{{student.transcripts.score_2}}</td>
                        <td class="text-center">{{student.transcripts.score_3}}</td>
                        <td class="text-center">{{student.transcripts.score_4}}</td>
                        <td class="text-center">{{student.transcripts.score_5}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-end w-full">
            <JetButton class="bg-blue-700">Next</JetButton>
        </div>
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
        created() {
        },
        methods: {
        },
        props:  {
            student: String,
            }
    })
</script>