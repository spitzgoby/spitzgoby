<template>
    <a :href="url" target="_blank">
        <div :class="socialClasses"
             @mouseover="highlighted = true;"
             @mouseout="highlighted = false;">
            <div class="spacer"></div>
            <h1 class="contact-icon text-center"><i :class="iconClasses"></i></h1>
            <div class="spacer"></div>
        </div>
    </a>
</template>

<script>
    export default {

        props: ['name', 'icon', 'url'],

        computed: {
            iconClasses: function() {
                return 'fa fa-'+ this.icon;
            },

            socialClasses: function() {
                return 'contact ' + this.name;
            }
        }
    }
</script>

<style lang="sass">
    .contact {
        float: left;
        width: 50%;

        .contact-icon,
        .contact-title {
            color: white;
        }

        &.github,
        &.github:hover {
             background-color: #4183c4;
        }

        &.twitter,
        &.twitter:hover {
             background-color: #55acee;
        }

        &.linkedin,
        &.linkedin:hover {
             background-color: #0077b5;
        }

        &.angellist,
        &.angellist:hover {
             background-color: white;
        }

        &.angellist {
            .contact-icon,
            .contact-title {
                color: black;
            }
        }
    }
</style>
