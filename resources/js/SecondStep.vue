<template>
    <div>
        <div class="tab d-flex justify-content-around mb-60" >
            <button class="tablinks btn btn-blue secondary-font" :class="{'active' : state.isStudent}" @click="changeTab(true, 'student')">Student </button>
            <button class="tablinks btn btn-blue secondary-font" :class="{'active' : !state.isStudent}" @click="changeTab(false, 'not-student')">Non - Student</button>
        </div>
        <div id="student" class="tabcontent" :class="{'active' : state.isStudent}">
            <div class="form-group mb-25">
                <div class="row">
                    <div class="col--50 vx__fist-name">
                        <input class="p" type="text" id="exampleInputText" placeholder="School">
                    </div>
                    <div class="col--50 vx__fist-name">
                        <input class="p" type="text" id="exampleInputText" placeholder="Grade">
                    </div>
                </div>
            </div>
            <div class="form-group mb-25">
                <input class="p" type="text" id="exampleInputText" placeholder="Curriculum / Major">
            </div>
            <div class="form-group mb-25">
                <div class="row">
                    <div class="col--50 vx__fist-name">
                        <Multiselect
                            v-model="store.cateogry"
                            :searchable = 'true'
                            :options="options"
                            :placeholder="'Category'"
                        />
                    </div>
                    <div class="col--50 vx__fist-name">
                        <Multiselect
                            v-model="store.subCategory"
                            :searchable = 'true'
                            :options="options"
                            :placeholder="'Sub categories'"
                        />
                    </div>
                </div>
            </div>
            <div class="form-group mb-25">
                <label class="p mb-5" for="exampleInputEmail1">Add skills to learn</label>
                <Multiselect
                    v-model="store.skills"
                    :mode = "'tags'"
                    :searchable = 'true'
                    :create-option = 'true'
                    @deselect = 'removeOption'
                    @option = 'addNewOption'
                    @clear = 'removeOption'
                    :append-new-option = 'false'
                    :append-new-tag = 'false'
                    @keydown = 'kewDown'
                    :options="options"
                    :placeholder="'Skills'"
                />
            </div>
        </div>
        <div id="nonstudent" class="tabcontent" :class="{'active' : !state.isStudent}" >
            <div class="form-group mb-25">
                <div class="row">
                    <div class="col--50 vx__fist-name">
                        <Multiselect
                                v-model="store.category"
                                :searchable = 'true'
                                :options="options"
                                :placeholder="'Category'"
                        />
                    </div>
                    <div class="col--50 vx__fist-name">

                        <Multiselect
                                v-model="store.subCategory"
                                :searchable = 'true'
                                :options="options"
                                :placeholder="'Sub categories'"
                        />
                    </div>
                </div>
            </div>

            <div class="form-group mb-25">
                <label class="p mb-5" for="exampleInputEmail1">Add skills to learn</label>
                <Multiselect
                    v-model="store.skills"
                    :mode = "'tags'"
                    :searchable = 'true'
                    :create-option = 'true'
                    @deselect = 'removeOption'
                    @option = 'addNewOption'
                    @clear = 'removeOption'
                    :append-new-option = 'false'
                    :append-new-tag = 'false'
                    @keydown = 'kewDown'
                    :options="options"
                />
            </div>
        </div>
    </div>
</template>
<script>
import { reactive, onMounted, inject, ref  } from 'vue';
import Multiselect from '@vueform/multiselect'
import { useRegisterStore } from "./stores/register";
export default {
    components: {
      Multiselect,
    },
    setup(_, context) {
        const axios = inject('axios')
        const store = useRegisterStore();
        const categories = ref([]);
        const state = reactive({
            isStudent : true
        })

        onMounted(() => {
            axios.get(
                "https://jsonplaceholder.typicode.com/users"
            ).then((res) => {
                categories.value = res.data
            })
        })

        const options = categories;
        const changeTab = (status, role) => {
            state.isStudent = status;
            store.role = role;
        }

        const addNewOption = (query, $select) => {
            store.newSkills.push(query);
        }

        const removeOption = (query, $select = '') => {
             store.newSkills = store.newSkills.filter((value) => {
                return value != query
            });
        }

        const kewDown = (event, $select = '') => {
            switch (event.key) {
            case 'Backspace':
                store.newSkills = store.newSkills.filter((value) => {
                    return value != store.skills.at(-1)
                });
                return
            }
        }

        // expose the state to the template
        return {
            state,
            store,
            options,
            changeTab,
            addNewOption,
            removeOption,
            kewDown
        }
    }
}
</script>

<style src="@vueform/multiselect/themes/default.css"></style>
<style>
.multiselect {
    font-size: 14px !important;
    font-weight: 400 !important;
    border:1px solid orange;
}
.multiselect input {
    border:0px !important
}
</style>
