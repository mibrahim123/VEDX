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
    import { reactive, ref } from 'vue';
    import { useRegisterStore } from "./stores/register";
    import FirstStep from './FirstStep.vue';
    import SecondStep from './SecondStep.vue';
    export default {
        components : {
            FirstStep,
            SecondStep
        },
        setup(_, context) {
            const store = useRegisterStore();
            const step = ref(1)
            const role = ref('student');
            const firstStep = ref(null);
            const secondStep = ref(null);

            const nextStep = () => {
                if (step.value == 1) {
                    step.value = step.value + 1
                    // firstStep.value.onSubmit()
                    // if(firstStep.value.meta.valid){
                    //     step.value = step.value + 1
                    // }
                } else {
                    secondStep.value.onSubmit()
                    if(secondStep.value.valid){
                        alert("yes");
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
