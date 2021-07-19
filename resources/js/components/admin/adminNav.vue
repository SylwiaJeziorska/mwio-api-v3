<template>
    <div class="mt-5 pt-5">
        <li class="nav-itome">
            <router-link
                class="text-dark"
                :to="{name:'Partners'}"
            >Partners</router-link
            >
        </li>
        <li>
            <router-link
                class="text-dark"
                :to="{name:'Installations'}"
            >Installation</router-link
            >
        </li>
        <li>
            <router-link
                class="text-dark"
                :to="{name:'Users'}"
            >Users</router-link
            >
        </li>
    </div>
</template>
