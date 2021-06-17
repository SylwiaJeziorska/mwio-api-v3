<template>
    <div class="container-fluid contact-page-wrapper">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <div class="col-md-10 offset-md-1 mt-5  justify-content-center bg-green">
                    <p class="text-uppercase p-2">Nous contacter</p>
                </div>
                <contactForm></contactForm>
            </div>
        </div>
    </div>
</template>

<script>
import contactForm from '../forms/Contact';

export default {
    components: {
        contactForm,
    },
};
</script>

<style>
</style>
