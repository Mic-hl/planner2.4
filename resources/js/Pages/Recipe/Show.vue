<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { defineProps } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';

function deleteRecipe(recipeId) {
    if (confirm('Are you sure you want to delete this recipe?')) {
        router.delete(`/recipes/${recipeId}`);
    }
}

defineProps(['recipe', 'page']);
</script>

<template>
    <Head title="Recipes" />

    <AuthenticatedLayout>
        <template #header>
            <h2>{{ recipe.title }}</h2>
        </template>

        <div class="content-wrapper">
            <div class="recipe">
                <div class="recipe-head">
                    <h2 class="recipe-title">
                        {{ recipe.title }}
                    </h2>
                    <div class="recipe-difficulty">
                        {{ recipe.difficulty }}
                    </div>
                    <div class="recipe-time">
                        {{ recipe.time }} min
                    </div>
                </div>
                <ul class="recipe-ingredients">
                    <li v-for="ingredient in recipe.ingredients" :key="ingredient">{{ ingredient }}</li>
                </ul>
                <div class="recipe-preparation">
                    {{ recipe.preparation }}
                </div>
                <div class="recipe-btns">
                    <Link :href="`/recipes?page=${page}`" class="button-secondary">
                        back
                    </Link>
                    <button @click="deleteRecipe(recipe.id)" class="button-danger">
                        delete
                    </button>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
