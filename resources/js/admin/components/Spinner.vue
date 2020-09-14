<template>
<div class="d-flex justify-content-center app-loading">
    <div class="lds-ring"><div></div><div></div><div></div><div></div></div><h4><span class="loading-text">Загрузка...</span></h4>
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
    width: 80px
    height: 80px
    div
        box-sizing: border-box
        display: block
        position: absolute
        width: 64px
        height: 64px
        margin: 8px
        border: 8px solid
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
</style>
