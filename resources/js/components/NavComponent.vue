<template>
    <div class="container nav">
        <div class="app-wraper">
            <div class="row nav-row">
                <nav id="nav">
                    <ul class="links">
                        <li class="scrolly" href="#header">
                            <router-link
                                to="/"
                            >home</router-link
                            >
                        </li>
                    </ul>
                </nav>
            </div>
            <router-view name="front"></router-view>
        </div>    </div>
</template>

<script>
export default {
    name: 'NavComponent',
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
