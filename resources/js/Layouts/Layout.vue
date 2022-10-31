<script setup>
import { ref } from 'vue';

</script>

<template>
    <div>
        <slot name="header" />
    </div>
    <div>
        <main>
            <div class="flex items-center bg-gray-200">
                <slot />
            </div>
        </main>
    </div>
</template>
