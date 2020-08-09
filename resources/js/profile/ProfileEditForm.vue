<template>
    <div class="ui-block">
        <article class="hentry post video">
            <div class="col-sm-7">
                <div class="form-group">
                    <label for="name">Изменить имя</label>
                    <input type="text" class="form-control form_edit_profile_field" id="name" name="name" v-model="name">
                    <small id="InputName1Help" class="form-text text-muted">Имя, которое видят все.</small>
                </div>

                <div class="form-group">
                    <label for="surname">Изменить фамилию</label>
                    <input type="text" class="form-control form_edit_profile_field" id="surname" name="surname" v-model="surname">
                    <small id="InputName2Help" class="form-text text-muted">Фамилия, которую видят все.</small>
                </div>

                <div class="form-group">
                    <label for="email">Сменить Email</label>
                    <input type="email" class="form-control form_edit_profile_field" id="email" name="email" v-model="email">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="gender">Выберите пол...</label>
                    <select class="form-control form_edit_profile_field" id="gender" name="gender" v-model="gender">
                        <option>Мужской</option>
                        <option>Женский</option>
                        <option>В смятении...</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="birth_date">Ваша дата рождения</label>
                    <input type="date" name="birth_date" class="form-control form_edit_profile_field" id="birth_date" v-model="birth_date">
                </div>

                <div class="form-group">
                    <label for="city">Выберите город</label>
                    <input type="text" class="form-control form_edit_profile_field" id="city" name="city" v-model="city">
                </div>


                <div class="form-group">
                    <label for="country">Выберите страну</label>
                    <input type="text" class="form-control form_edit_profile_field" id="country" name="country" v-model="country">
                </div>

                <div class="form-group">
                    <label for="creed">Девиз</label>
                    <input type="text" class="form-control form_edit_profile_field" id="creed" name="creed" v-model="creed">
                </div>
            </div>
        </article>
    </div>
</template>

<script>
export default {
    name: "ProfileEditForm",
    data() {
        return {
            name: null,
            surname: null,
            email: null,
            gender: null,
            birth_date: null,
            country: null,
            city: null,
            creed: null,
        }
    }
}
</script>

<style scoped lang="sass">

</style>
