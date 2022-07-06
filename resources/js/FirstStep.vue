<template>
    <div class="form-group mb-25">
            <h2 class="text-600 text-center mb-50">Register Now</h2>
            <div class="vx__progress-bar d-flex mb-40">
                <div class="register-bar progress--bar col--50 ">
                    <p class="mb-10 text-600">1. Registration Type</p>
                    <div class="progress-line"></div>
                </div>
                <div class="complete-bar progress--bar col--50 active">
                    <p class="mb-10 text-600">2. Complete Your Profile</p>
                    <div class="progress-line"></div>
                </div>
            </div>
            <h5 class="text-center text-600 mb-35">
                Please fill the complete form for
                <span class="secondary-font secondary-color">Learner</span>
            </h5>
            <h5 class="text-600 text-center mb-20">Social media</h5>
            <div class="vx__social-icon d-flex justify-content-center mb-25">
                <div class="icon facebook">
                                            <a href="https://www.facebook.com/">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="43" viewBox="0 0 42 43" fill="none" class=" in-svg replaced-svg">
                                                    <path d="M18.5528 31.6935V22.099H16V18.6445H18.5528V15.6939C18.5528 13.3753 20.0607 11.2461 23.5353 11.2461C24.9421 11.2461 25.9824 11.3801 25.9824 11.3801L25.9004 14.606C25.9004 14.606 24.8395 14.5958 23.6818 14.5958C22.4288 14.5958 22.228 15.1696 22.228 16.1221V18.6445H26L25.8359 22.099H22.228V31.6935H18.5528Z" fill="#FF9A08"></path>
                                                </svg>
                                            </a>
                </div>
                <div class="icon linkedin">
                                            <a href="https://www.linkedin.com/login">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="42" height="43" viewBox="0 0 42 43" fill="none" class=" in-svg replaced-svg">
                                                    <g clip-path="url(#clip0_1135_5540)">
                                                        <path d="M15.735 14.1853C15.735 15.2442 14.9025 16.1022 13.875 16.1022C12.8475 16.1022 12.015 15.2442 12.015 14.1853C12.015 13.1271 12.8475 12.2683 13.875 12.2683C14.9025 12.2683 15.735 13.1271 15.735 14.1853ZM15.75 17.6358H12V29.9044H15.75V17.6358ZM21.7365 17.6358H18.0105V29.9044H21.7372V23.4641C21.7372 19.8832 26.259 19.5903 26.259 23.4641V29.9044H30V22.1361C30 16.0938 23.3085 16.3139 21.7365 19.2882V17.6358Z" fill="#FF9A08"></path>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_1135_5540">
                                                            <rect width="18" height="18.4028" fill="white" transform="translate(12 12.2683)"></rect>
                                                        </clipPath>
                                                    </defs>
                                                </svg>
                                            </a>
                </div>
                <div class="icon google">
                                            <a href="https://www.google.com/">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none" class=" in-svg replaced-svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.6083 25.92V23.3143H26.8088C26.8741 23.6943 26.9286 24.0743 26.9286 24.5738C26.9286 28.9166 24.0092 32 19.6083 32C15.3925 32 11.9829 28.6018 11.9829 24.4C11.9829 20.1983 15.3925 16.8 19.6083 16.8C21.6671 16.8 23.3882 17.5492 24.7172 18.7869L22.6475 20.7738C22.081 20.2309 21.0897 19.6012 19.6083 19.6012C17.0047 19.6012 14.8805 21.7509 14.8805 24.4C14.8805 27.0492 17.0047 29.1989 19.6083 29.1989C22.6257 29.1989 23.7586 27.0383 23.9329 25.92H19.6083ZM33.7696 23.3143H35.9483V25.4858H33.7696V27.6572H31.5909V25.4858H29.4123V23.3143H31.5909V21.1429H33.7696V23.3143Z" fill="#0450B4"></path>
                                                </svg>
                                            </a>
                </div>
            </div>
            <div class="line mb-30">
                                        <hr>
                                    </div>
            <div class="row">
                <div class="col--50">
                    <div class="form-group mb-25">
                        <input class="p" type="text"
                        v-model = "store.firstName"
                        placeholder="First Name">
                    </div>
                </div>
                <div class="col--50">
                    <div class="form-group mb-25">
                        <input class="p" type="text"
                        v-model = "store.lastName"
                        placeholder="Last Name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col--50">
                    <div class="form-group mb-25">
                        <input class="p" type="email"
                        v-model = "store.email"
                        placeholder="Email Address">
                    </div>
                </div>
                <div class="col--50">
                    <div class="form-group mb-25">
                         <vue-tel-input v-model="phone" @input="onInput" :input-options = '{placeholder : "Phone Number", showDialCode : false}'></vue-tel-input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col--50">
                    <div class="form-group mb-25">
                        <input class="p" type="number"
                        v-model = "store.age"
                        placeholder="Age">
                    </div>
                </div>
                <div class="col--50">
                    <div class="form-group mb-25">
                        <input class="p" type="text"
                        v-model = "store.location"
                        placeholder="Location">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col--50">
                    <div class="form-group mb-25">
                        <input class="p" type="password"
                        v-model = "store.password"
                        placeholder="Password">
                    </div>
                </div>
                <div class="col--50">
                    <div class="form-group mb-25">
                        <input class="p" type="password"
                        v-model = "store.confirmPassword"
                        placeholder="Confirm Password">
                    </div>
                </div>
            </div>
    </div>
</template>
<script>
    // import { parsePhoneNumber, parsePhoneNumberFromString,isValidPhoneNumber} from 'libphonenumber-js';
    import { parsePhoneNumberFromString } from 'libphonenumber-js/max';
    import { reactive, ref } from 'vue';
    import { useRegisterStore } from "./stores/register";
    export default {
        setup(_, context) {
            const store = useRegisterStore();
            const onInput = (phone, phoneObject, input) => {
                // if(phoneObject) {
                //     let valid = parsePhoneNumberFromString("'" + phoneObject?.nationalNumber+"'" ,phoneObject?.country?.iso2 );

                //     store.countryCode = phoneObject.country.dialCode
                //     store.phone = phone
                //     store.validPhone = valid.isValid();
                // }
            }
            // expose the state to the template
            return {
                store,
                onInput
            }
        }
    }
</script>
