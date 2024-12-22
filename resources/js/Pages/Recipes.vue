<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import Recipe from '../Components/Recipe.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Recipes" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Recipes
            </h2>
        </template>
        <div class="content-wrapper">
            <ul class="recipe-list">
                <li>
                    <Recipe
                        title="Spaghetti Carbonara"
                        :ingredients="['Spaghetti', 'Eggs', 'Parmesan', 'Bacon', 'Black Pepper']"
                        preparation="Boil spaghetti. Cook bacon. Mix eggs with parmesan and combine with cooked spaghetti and bacon."
                        difficulty="Medium"
                        :time="30"
                    />
                    <Recipe
                        title="Pancakes"
                        :ingredients="['Milk', 'Flour', 'Eggs', 'Butter']"
                        preparation="Mix everything and then fry it in a pan."
                        difficulty="Easy"
                        :time="10"
                    />
                    <Recipe
                        title="Gulasch"
                        :ingredients="['Meat', 'Onions', 'Broth', 'Tomato paste', 'Paprika powder', 'Butter', 'Thyme', 'Majoran', 'Salt', 'Pepper']"
                        preparation="Fry the Meat for 10 minutes and then add the onions. After about 10 more minutes, add the tomato paste, mix it, and add the paprika powder. Mix the Butter with the Spices and add it to the pot. Cook it for about 90 minutes."
                        difficulty="Medium"
                        :time="120"
                    />
                </li>
            </ul>
        </div>
    </AuthenticatedLayout>
</template>
