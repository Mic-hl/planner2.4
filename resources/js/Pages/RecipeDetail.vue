<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

defineProps(['recipe']);
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
                    <Link
                        :href="`/recipes`"
                        class="button-secondary"
                    >
                        back
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>