<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Recipe from '../../Components/Recipe.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

defineProps(['recipes']);
</script>

<template>
    <Head title="Recipes" />

    <AuthenticatedLayout>
        <template #header>
            <h2>Recipes</h2>
        </template>

        <template #interactionHeader>
            <Link :href="`recipes/create`" class="button-secondary">
                New Recipe
            </Link>
        </template>

        <div class="content-wrapper">
            <ul class="recipe-list">
                <li v-for="recipe in recipes" :key="recipe.id">
                    <Link
                        :href="`recipes/${recipe.id}`"
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
    </AuthenticatedLayout>
</template>
