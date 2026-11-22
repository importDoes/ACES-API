
    <?php

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers as Controllers;

    /*
    |--------------------------------------------------------------------------
    | Authentication Routes
    |--------------------------------------------------------------------------
    */

    Route::group([
        'middleware' => 'api',
        'prefix' => 'auth',
    ], function () {

        // Public authentication route
        Route::post('login', [Controllers\AuthController::class, 'login']);

        // Protected authentication routes
        Route::middleware('auth:api')->group(function () {
            Route::post('logout', [Controllers\AuthController::class, 'logout']);
            Route::post('refresh', [Controllers\AuthController::class, 'refresh']);
            Route::get('me', [Controllers\AuthController::class, 'me']);
        });
    });


    Route::post('register', [
        Controllers\RegistrationController::class,
        'register'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Public API Resources
    |--------------------------------------------------------------------------
    */

    Route::apiResources([
        'students' => Controllers\StudentController::class,
        'permissions' => Controllers\PermissionController::class,
        'roles' => Controllers\RoleController::class,
        'addresses' => Controllers\AddressController::class,
        'student-details' => Controllers\StudentDetailController::class,
        'assessment-dimensions' => Controllers\AssessmentDimensionController::class,
    'indicators' => Controllers\IndicatorController::class,
    'assessment-questions' => Controllers\AssessmentQuestionController::class,
    'question-options' => Controllers\QuestionOptionController::class,
    'option-indicator-scores' => Controllers\OptionIndicatorScoreController::class,
    'assessment-sessions' => Controllers\AssessmentSessionController::class,
    'assessment-responses' => Controllers\AssessmentResponseController::class,
    'learner-indicator-scores' => Controllers\LearnerIndicatorScoreController::class,
    'career-pathways' => Controllers\CareerPathwayController::class,
    'pathway-indicator-mappings' => Controllers\PathwayIndicatorMappingController::class,
    'assessment-results' => Controllers\AssessmentResultController::class,
    'pathway-recommendations' => Controllers\PathwayRecommendationController::class,
    'career-decision-scores' => Controllers\CareerDecisionScoreController::class,
    'career-value-preferences' => Controllers\CareerValuePreferenceController::class,
    'career-interventions' => Controllers\CareerInterventionController::class,
    'roadmap-steps' => Controllers\RoadmapStepController::class,
    ]);
