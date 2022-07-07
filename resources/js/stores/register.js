import { defineStore } from "pinia";

export const useRegisterStore = defineStore("register", {
    state: () => {
        return {
            role: '',
            gender: '',
            email: '',
            firstName: '',
            lastName: '',
            phone: '',
            countryCode: '',
            age: '',
            location: '',
            password: '',
            confirmPassword: '',
            validPhone: true,
            skills: [],
            newSkills: [],
            category: '',
            subCategory: ''
        };
    },
    actions: {
        increment(value = 1) {
            alert("yes");
        },
    },
    // getters: {
    //     doubleCount: (state) => {
    //         return state.count * 2;
    //     },
    //     doublePlusOne() {
    //         return this.doubleCount + 1
    //     },
    // },
    // setters: {

    // }
});