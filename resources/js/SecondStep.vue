<template>
    <div>
        <div class="tab d-flex justify-content-around mb-60" >
            <button class="tablinks btn btn-blue secondary-font" :class="{'active' : state.isStudent}" @click="changeTab(true, 'student')">Student </button>
            <button class="tablinks btn btn-blue secondary-font" :class="{'active' : !state.isStudent}" @click="changeTab(false, 'not-student')">Non - Student</button>
        </div>
        <div id="student" class="tabcontent active" :class="{'active' : state.isStudent}">
            <div v-show="state.isStudent">
                <div class="form-group mb-25">
                    <div class="row">
                        <div class="col--50 vx__fist-name">
                            <Field class="p" type="text"
                                v-model = "store.school"
                                name = "school"
                                placeholder="School"
                            />
                            <ErrorMessage name="school" v-slot="{ message }" >
                                <span class="error">{{ message }}</span>
                            </ErrorMessage>
                        </div>
                        <div class="col--50 vx__fist-name">
                            <Field class="p" type="text"
                                v-model = "store.grade"
                                name = "grade"
                                placeholder="Grade"
                            />
                            <ErrorMessage name="grade" v-slot="{ message }" >
                                <span class="error">{{ message }}</span>
                            </ErrorMessage>
                        </div>
                    </div>
                </div>
                <div class="form-group mb-25">
                    <Field class="p" type="text"
                        v-model = "store.curriculum"
                        name = "curriculum"
                        placeholder="Curriculum / Major"
                    />
                    <ErrorMessage name="curriculum" v-slot="{ message }" >
                        <span class="error">{{ message }}</span>
                    </ErrorMessage>
                </div>
            </div>
            <div class="form-group mb-25">
                <div class="row">
                    <div class="col--50 vx__fist-name">
                        <Field name="category" v-model="store.category">
                            <Multiselect
                                v-model="store.category"
                                :searchable = 'true'
                                :label = '"title"'
                                @select="fetchSubcategory"
                                :value-prop = '"id"'
                                :options="categories"
                                :placeholder="'Category'"
                            />
                        </Field>
                        <ErrorMessage name="category" v-slot="{ message }" >
                            <span class="error">{{ message }}</span>
                        </ErrorMessage>
                    </div>
                    <div class="col--50 vx__fist-name">
                        <Field name="subcategory" v-model="store.sub_category">
                            <Multiselect
                                v-model="store.sub_category"
                                :searchable = 'true'
                                :label = '"title"'
                                :value-prop = '"id"'
                                :options="subCategories"
                                :placeholder="'Sub categories'"
                            />
                        </Field>
                        <ErrorMessage name="subcategory" v-slot="{ message }" >
                            <span class="error">{{ message }}</span>
                        </ErrorMessage>
                    </div>
                </div>
            </div>
            <div class="form-group mb-25">

                <label class="p mb-5" >Add skills to learn</label>
                <Field name="skills" v-model="store.skills">
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
                        :label = '"title"'
                        :value-prop = '"id"'
                        @keydown = 'kewDown'
                        :options="skills"
                        :placeholder="'Skills'"
                    />
                    </Field>
                    <ErrorMessage name="skills" v-slot="{ message }" >
                        <span class="error">{{ message }}</span>
                    </ErrorMessage>
            </div>
        </div>
    </div>
</template>
<script>
import { reactive, onMounted, inject, ref } from 'vue';
import Multiselect from '@vueform/multiselect'
import { useRegisterStore } from "./stores/register";
import * as Yup from "yup";
import { useForm, Field, ErrorMessage} from 'vee-validate';

export default {
    components: {
        Multiselect,
        Field,
        ErrorMessage
    },
    setup(_, context) {
        const axios = inject('axios')
        const store = useRegisterStore();

        const categories = ref([]);
        const subCategories = ref([]);
        const skills = ref([]);
        const state = reactive({
            isStudent : true
        })
        // const {value : skillsToValidate, errorMessage : skillErrorMessage , validate } = useField('skills');

        const schema = Yup.object({
            school : Yup.string().required().label('School'),
            grade : Yup.string().required().label('Grade'),
            curriculum : Yup.string().required().label('Curriculum'),
            skills : Yup.array().min(1, 'Please select at lease one skill'),
            category : Yup.string().required('Please select at least one category').label('Category'),
            subcategory : Yup.string().required('Please select at least one sub category').label('Sub Category'),
            skills : Yup.array().min(1, 'Please select at least one skill')
        });


        const { handleSubmit, meta} = useForm({
            validationSchema: schema
        });

        const onSubmit = handleSubmit(() => console.log('hiii'));

        onMounted(() => {
            axios.get('api/categories'
            ).then((res) => {
                categories.value = res.data.data
            })

            axios.get('api/skills'
            ).then((res) => {
                skills.value = res.data.data
            })
        })

        const fetchSubcategory = async () => {
            if(store.category) {
                axios.get('api/sub-categories',
                {
                    params : {
                        parent_id : store.category
                    }
                }
                ).then((res) => {
                    subCategories.value = res.data.data
                })
            }
        }

        const changeTab = (status, role) => {
            state.isStudent = status;
            store.role = role;
        }

        const addNewOption = (query, $select) => {
            store.new_skills.push(query);
        }

        const removeOption = (query, $select = '') => {
             store.new_skills = store.new_skills.filter((value) => {
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
            categories,
            subCategories,
            skills,
            changeTab,
            addNewOption,
            removeOption,
            kewDown,
            fetchSubcategory,
            handleSubmit,
            // skillsToValidate,
            // skillErrorMessage,
            onSubmit,
            meta,
            // validate

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
