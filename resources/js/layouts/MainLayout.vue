<template>
    <div class="container p-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Services</router-link>
                    <router-link to="/Commandes" class="nav-item nav-link">Bons de commandes</router-link>
                </div>
            </div>
        </nav>

        <router-view class="p-5" />
    </div>
</template>

<script>
export default {};
</script>
