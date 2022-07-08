<template>
    <div class="form--data" >
        <FirstStep v-show='step == 1 ? true : false' ref="firstStep" />
        <SecondStep v-show='step == 2 ? true : false' @changeRole = 'changeRole' ref="secondStep"/>

        <div class="vx__register--button mb-25">
            <button type="button" class="btn btn-blue" @click = 'nextStep()'>
                {{ step == 1 ? 'Register'  : 'Sign Up' }}</button>
        </div>
    </div>
    <!-- <p class="vx__account--link text-center">Already have an account? <a href="login.html">Login</a></p> -->

</template>
<script>
    import { reactive, ref, inject } from 'vue';
    import { useRegisterStore } from "./stores/register";
    import FirstStep from './FirstStep.vue';
    import SecondStep from './SecondStep.vue';
    export default {
        components : {
            FirstStep,
            SecondStep
        },
        setup(_, context) {

            const axios = inject('axios')
            axios.defaults.withCredentials = true;
            const store = useRegisterStore();
            const step = ref(1)
            const role = ref('student');
            const firstStep = ref(null);
            const secondStep = ref(null);

            const nextStep = () => {
                if (step.value == 1) {
                    // step.value = step.value + 1
                    firstStep.value.onSubmit()
                    if(firstStep.value.meta.valid){
                        step.value = step.value + 1
                    }
                } else {
                    secondStep.value.onSubmit()

                    store.skills = store.skills.filter((value) => {
                        return !store.new_skills.includes(value)
                    })

                    if(secondStep.value.meta.valid){
                        axios.post('api/register',
                            store
                        ).then((res) => {
                            axios.get('api/user', {})
                            .then((res) => {
                                console.log(res);

                            })

                        }).catch((error) => {
                            if(store.error = error.response.data.errors) {
                               if ( store.error.hasOwnProperty('email') || store.error.hasOwnProperty('phone')) {
                                    step.value = 1;
                               }
                            }
                        })

                    }
                }
            }

            // expose the state to the template
            return {
                step,
                role,
                store,
                nextStep,
                firstStep,
                secondStep
            }
        }
    }
</script>
