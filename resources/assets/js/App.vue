<template>
    <div class="main main-raised mt-4">
        <div class="section section-basic">
            <transition name="fade">
                <keep-alive>
                    <router-view></router-view>
                </keep-alive>
            </transition>
        </div>
    </div>
</template>

<script>

  export default {}
</script>