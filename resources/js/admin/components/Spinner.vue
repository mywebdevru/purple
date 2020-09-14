<template>
<div class="d-flex justify-content-center align-items-center">
    <div class="lds-ring"><div></div><div></div><div></div><div></div></div><div><span class="loading-text ml-1">Загрузка...</span></div>
</div>
</template>

<script>
export default {
name: "Spinner"
}
</script>

<style scoped lang="sass">
.lds-ring
    display: inline-block
    position: relative
    width: 19px
    height: 19px
    div
        box-sizing: border-box
        display: block
        position: absolute
        width: 16px
        height: 16px
        margin: 0
        border: 3px solid
        border-radius: 50%
        animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite
        border-color: #fff transparent transparent transparent
        :nth-child(1)
            animation-delay: -0.45s
        :nth-child(2)
            animation-delay: -0.3s
        :nth-child(3)
            animation-delay: -0.15s
@keyframes lds-ring
  0%
    transform: rotate(0deg)
  100%
    transform: rotate(360deg)
.loading-text
    font-weight: 600
    font-family: "Karla", sans-serif
    color: #f1f5f7
</style>
