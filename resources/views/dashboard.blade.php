 <x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Dashboard') }}
         </h2>
         
     </x-slot>

     <div class="py-12">
         <div class="container">
             <div class="row g-4">

                 <!-- Students Card -->
                 <div class="col-12 col-md-6 col-lg-4">
                     <a href="{{ route('student.index') }}" class="text-decoration-none">
                         <div
                             class="card shadow-sm border-0 h-100 text-center p-4 
                                    hover-scale transition">
                             <div class="mb-3">
                                 <!-- Student Icon -->
                                 <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#0d6efd"
                                     viewBox="0 0 16 16">
                                     <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                     <path d="M2 14s1-4 6-4 6 4 6 4H2z" />
                                 </svg>
                             </div>
                             <h5 class="card-title text-dark">Students</h5>
                             <p class="card-text fs-4 text-dark">{{ \App\Models\Student::count() }}</p>
                         </div>
                     </a>
                 </div>

                 <!-- Teachers Card -->
                 <div class="col-12 col-md-6 col-lg-4">
                     <a href="{{ route('teacher.index') }}" class="text-decoration-none">
                         <div
                             class="card shadow-sm border-0 h-100 text-center p-4 
                                    hover-scale transition">
                             <div class="mb-3">
                                 <!-- Teacher Icon -->
                                 <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#198754"
                                     viewBox="0 0 16 16">
                                     <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                     <path d="M2 14s1-4 6-4 6 4 6 4H2z" />
                                     <path d="M12 2h2v2h-2V2z" />
                                 </svg>
                             </div>
                             <h5 class="card-title text-dark">Teachers</h5>
                             <p class="card-text fs-4 text-dark">{{ \App\Models\Teacher::count() }}</p>
                         </div>
                     </a>
                 </div>

                 <!-- You can add more cards here for Fees, Assignments, etc. -->

             </div>
         </div>
     </div>

     <style>
         /* Hover Scale Animation */
         .hover-scale {
             transition: transform 0.3s ease, box-shadow 0.3s ease;
         }

         .hover-scale:hover {
             transform: translateY(-5px) scale(1.05);
             box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
         }

         /* Responsive adjustments if needed */
        @media (max-width: 576px) {
             .card {
                 padding: 2rem 1rem;
             }
         }   
         @media (min-width: 577px) and (max-width: 768px) {
             .card {
                 padding: 3rem 2rem;
             }
         }
         @media (min-width: 769px) and (max-width: 992px) {
                .card {
                    padding: 4rem 3rem;
                }
            }   
        @media (min-width: 993px) {
                .card {
                    padding: 4rem 4rem;
                }
            }   

     </style>
 </x-app-layout>
