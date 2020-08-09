<template>
    <div class="ui-block">
        <article class="hentry post video">
            <div class="col-sm-7">
                <div class="form-group">
                    <label for="exampleInputName1">Изменить имя</label>
                    <input type="text" class="form-control form_edit_profile_field" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваше прекрасное имя здесь..." value="Иван">
                    <small id="InputName1Help" class="form-text text-muted">Имя, которое видят все.</small>
                </div>

                <div class="form-group">
                    <label for="exampleInputName2">Изменить фамилию</label>
                    <input type="text" class="form-control form_edit_profile_field" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваша фамилия здесь..." value="Иванов">
                    <small id="InputName2Help" class="form-text text-muted">Фамилия, которую видят все.</small>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail">Сменить Email</label>
                    <input type="email" class="form-control form_edit_profile_field" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ваш адрес электронной почты, если его надо сменить..." value="example@gb.ru">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>

                <div class="form-group">
                    <label for="examplecalendar">Выберите пол...</label>
                    <select class="form-control form_edit_profile_field" id="examplecalendar">
                        <option>Мужской</option>
                        <option>Женский</option>
                        <option>В смятении...</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Ваша дата рождения</label>
                    <input type="date" name="bday" max="3000-12-31" min="1000-01-01" class="form-control form_edit_profile_field">
                </div>

                <div class="form-group">
                    <label for="examplecity">Выберите страну</label>
                    <select class="form-control form_edit_profile_field" id="country" value="Город, который выбрал пользователь"></select>
                </div>

                <div class="form-group">
                    <label for="examplecity">Выберите город</label>
                    <select class="form-control form_edit_profile_field" id="city" value="Город, который выбрал пользователь"></select>
                </div>

                <div class="form-group">
                    <label for="exampleInputCreed1">Кредо</label>
                    <input type="text" class="form-control form_edit_profile_field" id="exampleInputCreed1" aria-describedby="emailHelp" placeholder="Ваша фраза здесь...">
                    <small id="exampleInputCreed1" class="form-text text-muted">Не обязательно указывать</small>
                </div>
            </div>
        </article>
    </div>
</template>

<script>
export default {
    name: "ProfileEditForm"
}
</script>

<style scoped>

</style>
