import { defineStore } from "pinia";

export const useRegisterStore = defineStore("register", {
    state: () => {
        return {
            role: 'student',
            gender: '0',
            email: '',
            first_name: '',
            last_name: '',
            phone: '',
            country_code: '',
            age: '',
            location: '',
            password: '',
            confirm_password: '',
            validPhone: true,
            skills: [],
            new_skills: [],
            category: '',
            sub_category: '',
            error: []
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