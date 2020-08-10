<template>
    <div class="ui-block">
        <article class="hentry post video">
            <div class="col-sm-7">
                <form @submit.prevent="save">
                    <div class="form-group">
                        <label for="name">Изменить имя</label>
                        <input type="text"
                               class="form-control form_edit_profile_field"
                               id="name"
                               name="name"
                               v-model="profile.name"
                               :class="[{'is-invalid' : errorsFor('name')}]">
                        <validation-errors :errors="errorsFor('name')"></validation-errors>
                    </div>

                    <div class="form-group">
                        <label for="surname">Изменить фамилию</label>
                        <input type="text"
                               class="form-control form_edit_profile_field"
                               id="surname"
                               name="surname"
                               v-model="profile.surname"
                               :class="[{'is-invalid' : errorsFor('surname')}]">
                        <validation-errors :errors="errorsFor('surname')"></validation-errors>
                    </div>

                    <div class="form-group">
                        <label for="email">Сменить Email</label>
                        <input type="email"
                               class="form-control form_edit_profile_field"
                               id="email"
                               name="email"
                               v-model="profile.email"
                               :class="[{'is-invalid' : errorsFor('email')}]">
                        <validation-errors :errors="errorsFor('email')"></validation-errors>
                    </div>

                    <div class="form-group">
                        <label for="gender">Выберите пол...</label>
                        <select class="form-control form_edit_profile_field"
                                id="gender"
                                name="gender"
                                v-model="profile.gender"
                                :class="[{'is-invalid' : errorsFor('gender')}]">
                            <option :selected="profile.gender === 'Мужчина'">Мужчина</option>
                            <option :selected="profile.gender === 'Женщина'">Женщина</option>
                            <option :selected="profile.gender === 'В смятении'">В смятении</option>
                        </select>
                        <validation-errors :errors="errorsFor('gender')"></validation-errors>
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Ваша дата рождения</label>
                        <input type="date"
                               name="birth_date"
                               class="form-control form_edit_profile_field"
                               id="birth_date"
                               v-model="profile.birth_date"
                               :class="[{'is-invalid' : errorsFor('birth_date')}]">
                        <validation-errors :errors="errorsFor('birth_date')"></validation-errors>
                    </div>

                    <div class="form-group">
                        <label for="city">Выберите город</label>
                        <input type="text"
                               class="form-control form_edit_profile_field"
                               id="city"
                               name="city"
                               @click="location"
                               v-model="profile.city"
                               :class="[{'is-invalid' : errorsFor('city')}]">
                        <validation-errors :errors="errorsFor('city')"></validation-errors>
                    </div>
                    <div class="form-group">
                        <label for="country">Выберите страну</label>
                        <input type="text"
                               class="form-control form_edit_profile_field"
                               id="country"
                               name="country"
                               v-model="profile.country"
                               :class="[{'is-invalid' : errorsFor('country')}]">
                        <validation-errors :errors="errorsFor('country')"></validation-errors>
                    </div>
                    <div class="form-group">
                        <label for="creed">Девиз</label>
                        <input type="text"
                               class="form-control form_edit_profile_field"
                               id="creed"
                               name="creed"
                               v-model="profile.creed"
                               :class="[{'is-invalid' : errorsFor('creed')}]">
                        <validation-errors :errors="errorsFor('creed')"></validation-errors>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Сохранить</button>
                </form>
            </div>
        </article>
    </div>
</template>

<script>
import validationErrorsMixin from "../../mixins/validationErrorsMixin";
import { is422 } from "../../utils/response";
import ValidationErrors from "../shared/ValidationErrors";

export default {
    name: "ProfileEditForm",
    mixins: [validationErrorsMixin],
    props: {
        id: Number,
    },
    data() {
        return {
            profile: {
                name: null,
                surname: null,
                email: null,
                gender: 'В смятении',
                birth_date: null,
                country: null,
                city: null,
                creed: null,
            },
            loading: false,
            status: null,
        }
    },
    methods: {
        async save() {
            this.loading = true;
            try {
                const response = (await axios.put(`/api/profile/${this.id}`, this.profile));
                this.status = response.status;
                this.errors = null;
                swal('Успех!', response.data, 'success');
            } catch (e) {
                this.status = e.response.status;
                if(is422(e)) {
                    this.errors = e.response.data.errors;
                    return;
                }
                swal('Ошибка сервера', e.response.statusText, 'error');
            } finally {
                this.loading = false;
            }
        },
        location() {
            const that = this;
            ymaps.ready(init);
            function init() {
                const suggestView = new ymaps.SuggestView('city');
                suggestView.events.add('select', function (e) {
                    let location = e.get('item').value;
                    let locationArr = _.split(location, ',');
                    let city = _.trim(_.last(locationArr));
                    let country = _.trim(_.first(locationArr));
                    that.profile.city = city;
                    that.profile.country = country;
                    $('#city').val(city);
                    $('#country').val(country);
                    suggestView.destroy();
                });
            }
        }
    },
    async created() {
        this.loading = false;
        try {
            this.profile = (await axios.get(`/api/profile/${this.id}`)).data.data;
        } catch (e) {
            console.log(e);
        } finally {
            this.loading = false;
        }
    },
    components: {
        ValidationErrors,
    }
}
</script>

<style scoped lang="sass">

</style>
