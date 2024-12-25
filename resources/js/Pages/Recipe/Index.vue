<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Recipe from '../../Components/Recipe.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps(['recipes']);
</script>

<template>
    <Head title="Recipes" />

    <AuthenticatedLayout>
        <template #header>
            <h2>Recipes</h2>
        </template>

        <template #interactionHeader>
            <Link :href="`recipes/create?page=${recipes.current_page}`" class="button-secondary">
                New Recipe
            </Link>
        </template>

        <div class="content-wrapper">
            <ul class="recipe-list">
                <li v-for="recipe in recipes.data" :key="recipe.id">
                    <Link
                        :href="`recipes/${recipe.id}?page=${recipes.current_page}`"
                        class="recipe-link"
                    >
                        <Recipe
                            :title="recipe.title"
                            :ingredients="recipe.ingredients"
                            :preparation="recipe.preparation"
                            :difficulty="recipe.difficulty"
                            :time="recipe.time"
                        />
                    </Link>
                </li>
            </ul>
        </div>

        <div class="pagination">
            <Link
                v-for="(link, index) in recipes.links"
                :key="index"
                :href="link.url || '#'"
                v-html="link.label"
                :class="{ 'pagination-link button-primary': true, 'active button-secondary': link.active }"
                :aria-disabled="!link.url"
            ></Link>
        </div>

    </AuthenticatedLayout>
</template>
