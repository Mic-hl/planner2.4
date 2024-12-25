<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { defineProps } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

// Define the form state using Inertia's useForm
const form = useForm({
    title: '',
    ingredients: [''], // Start with one empty ingredient
    preparation: '',
    difficulty: 'Easy', // Default value
    time: null,
});

// Method to add an ingredient
const addIngredient = () => {
    form.ingredients.push('');
};

// Method to remove an ingredient
const removeIngredient = (index) => {
    form.ingredients.splice(index, 1);
};

// Handle form submission
const submitForm = () => {
    form.post('/recipes', {
        onSuccess: () => {
            // Optionally clear the form or redirect after success
            form.reset();
        },
    });
};

defineProps(['recipe', 'page']);
</script>

<template>
    <Head title="Create Recipe" />

    <AuthenticatedLayout>
        <template #header>
            <h2>Create a new recipe</h2>
        </template>

        <div class="content-wrapper">
            <div class="recipe">
                <form @submit.prevent="submitForm" class="add-recipe">
                    <h2>Create Recipe</h2>
                    <div class="title-row">
                        <label for="title">Title</label>
                        <input
                            type="text"
                            id="title"
                            v-model="form.title"
                            placeholder="Recipe title"
                        />
                    </div>
                    <div class="ingredients-row">
                        <label>Ingredients</label>
                        <div v-for="(ingredient, index) in form.ingredients" :key="index" class="ingredient-group">
                            <input
                                type="text"
                                v-model="form.ingredients[index]"
                                placeholder="Ingredient"
                            />
                            <button type="button" class="button-danger" @click="removeIngredient(index)" v-if="form.ingredients.length > 1">Remove</button>
                        </div>
                        <div class="ingredient-group">
                            <button type="button" class="button-secondary" @click="addIngredient">Add Ingredient</button>
                        </div>
                    </div>
                    <div class="preparation-row">
                        <label for="preparation">Preparation</label>
                        <textarea
                            id="preparation"
                            v-model="form.preparation"
                            placeholder="Step-by-step preparation"
                        ></textarea>
                    </div>
                    <div class="difficulty-row">
                        <label for="difficulty">Difficulty</label>
                        <select id="difficulty" v-model="form.difficulty">
                            <option>Easy</option>
                            <option>Medium</option>
                            <option>Hard</option>
                        </select>
                    </div>
                    <div class="time-row">
                        <label for="time">Time (minutes)</label>
                        <input
                            type="number"
                            id="time"
                            v-model="form.time"
                            placeholder="Cooking time"
                        />
                    </div>
                    <div class="controls">
                        <button type="submit" class="button-secondary">Add Recipe</button>
                        <Link :href="`/recipes?page=${page}`" class="button-danger">
                            Cancel
                        </Link>
                    </div>
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
