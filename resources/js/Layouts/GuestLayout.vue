<script setup></script>

<template>
    <div class="main-wrapper">
        <div class="page-wrapper full-page">
            <div
                class="page-content d-flex align-items-center justify-content-center"
            >
                <div class="row w-100 mx-0 auth-page">
                    <div class="col-md-8 col-xl-6 mx-auto">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-4 pe-md-0">
                                    <!-- TODO: Change image -->
                                    <div class="auth-side-wrapper"></div>
                                </div>
                                <div class="col-md-8 ps-md-0">
                                    <slot />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
