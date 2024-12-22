<template>
    <div class="recipe">
        <div class="recipe-head">
            <h2 class="recipe-title">
                {{ title }}
            </h2>
            <div class="recipe-difficulty">
                {{ difficulty }}
            </div>
            <div class="recipe-time">
                {{ time }} min
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'Recipe',
        props: {
            title: {
                type: String,
                required: true,
            },
            ingredients: {
                type: Array,
                required: true,
            },
            preparation: {
                type: String,
                required: true,
            },
            difficulty: {
                type: String,
                required: true,
            },
            time: {
                type: Number,
                required: true,
            },
        },
    };
</script>
