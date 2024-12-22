<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Recipe from '../Components/Recipe.vue';
import { Head } from '@inertiajs/vue3';

defineProps(['recipes']);
</script>

<template>
    <Head title="Recipes" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight"
            >
                Recipes
            </h2>
        </template>
        <div class="content-wrapper">
            <ul class="recipe-list">
                <li v-for="recipe in recipes" :key="recipe.id">
                    <Recipe
                        :title="recipe.title"
                        :ingredients="recipe.ingredients"
                        :preparation="recipe.preparation"
                        :difficulty="recipe.difficulty"
                        :time="recipe.time"
                    />
                </li>
            </ul>
        </div>
    </AuthenticatedLayout>
</template>
