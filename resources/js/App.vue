<template>
    <div class="form--data" >
        <FirstStep v-show='step == 1 ? true : false'/>
        <SecondStep v-show='step == 2 ? true : false' @changeRole = 'changeRole' />

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
        setup() {
            const store = useRegisterStore();
            const step = ref(1)
            const role = ref('student');

            const nextStep = () => {
                step.value ++;
            }

            // expose the state to the template
            return {
                step,
                role,
                store,
                nextStep
            }
        }
    }
</script>
