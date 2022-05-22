<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifs', function (Blueprint $table) {
            $table->id();
            $table->string('incidentId', 25)->unique();
            $table->string('survivorCode', 25)->nullable();
            $table->string('caseManagerCode', 25)->nullable();
            $table->date('dateOfReport')->nullable();
            $table->date('dateOfIncident')->nullable();
            $table->string('reportedBy', 50)->nullable();
            $table->date('dateOfBirth')->nullable();
            $table->string('sex', 25)->nullable();
            $table->string('clanEthnicity', 25)->nullable();
            $table->string('countryOfOrigin', 25)->nullable();
            $table->string('nationality', 25)->nullable();
            $table->string('religion', 25)->nullable();
            $table->string('civilMaritalStatus', 25)->nullable();
            $table->string('numberAgeOfChildrenDependant', 25)->nullable();
            $table->string('occupation', 25)->nullable();
            $table->string('displacedPerson', 25)->nullable();
            $table->string('displacementStatusAtReport', 50)->nullable();
            $table->string('personWithDisability', 50)->nullable();
            $table->string('unaccompaniedOrSeparatedChild', 50)->nullable();
            $table->string('survivorLivesAlone', 25)->nullable();
            $table->string('survivorRelationWithCaretaker', 50)->nullable();
            $table->string('caretakerMaritalStatus', 50)->nullable();
            $table->string('caretakerOccupation', 50)->nullable();
            $table->string('detailsOfIncident')->nullable();
            $table->string('incidentTimeOfDay', 50)->nullable();
            $table->string('incidentLocation', 50)->nullable();
            $table->string('incidentRegion', 50)->nullable();
            $table->string('incidentArea', 50)->nullable();
            $table->string('incidentCamp', 50)->nullable();
            $table->string('gbvType', 50)->nullable();
            $table->string('harmfulTraditionalPractice', 25)->nullable();
            $table->string('moneyGoodsBenefitsAndOrServicesExchanged', 25)->nullable();
            $table->string('typeOfAbduction', 50)->nullable();
            $table->string('previouslyReportedThisIncident', 255)->nullable();
            $table->string('typeNameHealthMedicalServices', 255)->nullable();
            $table->string('typeNamePsychosocialCounselingServices', 255)->nullable();
            $table->string('typeNamePoliceOtherSecurityActor', 255)->nullable();
            $table->string('typeNameLegalAssistanceServices', 255)->nullable();
            $table->string('typeNameLivelihoodsProgram', 255)->nullable();
            $table->string('typeNameSafeHouseShelter', 255)->nullable();
            $table->string('typeNameOtherPreviouslyReportedThisIncident', 255)->nullable();
            $table->string('previousGbvIncidents', 255)->nullable();
            $table->string('numberOfAllegedPrimaryPerpetrators', 50)->nullable();
            $table->string('allegedPerpetratorSex', 50)->nullable();
            $table->string('nationalityOfAllegedPerpetrator', 50)->nullable();
            $table->string('clanEthnicityOfAllegedPerpetrator', 50)->nullable();
            $table->string('allegedPerpetratorAgeGroup', 50)->nullable();
            $table->string('allegedPerpetratorRelationshipWithSurvivor', 50)->nullable();
            $table->string('mainOccupationOfAllegedPerpetrator', 50)->nullable();
            $table->string('referredToYouFrom', 50)->nullable();
            $table->string('safeHouseShelter', 50)->nullable();
            $table->date('safeHouseShelterReportedAppointmentDate')->nullable();
            $table->string('safeHouseShelterNameLocation')->nullable();
            $table->string('safeHouseShelterNotes')->nullable();
            $table->string('healthMedicalServices', 50)->nullable();
            $table->date('healthMedicalServicesReportedAppointmentDate')->nullable();
            $table->string('healthMedicalServicesNameLocation')->nullable();
            $table->date('healthMedicalServicesFollowUpAppointmentDate')->nullable();
            $table->string('healthMedicalServicesNotes')->nullable();
            $table->string('psychosocialServices', 50)->nullable();
            $table->date('psychosocialServicesReportedAppointmentDate')->nullable();
            $table->string('psychosocialServicesNameLocation')->nullable();
            $table->string('psychosocialServicesNotes')->nullable();
            $table->string('wantsLegalAction', 50)->nullable();
            $table->string('legalAssistanceServices', 50)->nullable();
            $table->date('legalAssistanceServicesReportedAppointmentDate')->nullable();
            $table->string('legalAssistanceServicesNameLocation')->nullable();
            $table->string('legalAssistanceServicesNotes')->nullable();
            $table->string('policeOtherSecurityActor', 50)->nullable();
            $table->date('policeOtherSecurityActorReportedAppointmentDate')->nullable();
            $table->string('policeOtherSecurityActorNameLocation')->nullable();
            $table->string('policeOtherSecurityActorNotes')->nullable();
            $table->string('livelihoodsProgram', 50)->nullable();
            $table->date('livelihoodsProgramReportedAppointmentDate')->nullable();
            $table->string('livelihoodsProgramNameLocation')->nullable();
            $table->string('livelihoodsProgramNotes')->nullable();
            $table->string('emotionalStateAtBeginning')->nullable();
            $table->string('emotionalStateAtEnd')->nullable();
            $table->string('safeWhenLeaves')->nullable();
            $table->string('whoGiveEmotionalSupport')->nullable();
            $table->string('actionsTakenSafety')->nullable();
            $table->string('otherRelevantInformation')->nullable();
            $table->string('explainedConsequencesOfRapeClient', 50)->nullable();
            $table->string('explainedConsequencesOfRapeCaregiver', 50)->nullable();
            $table->string('consentGivenForInformationSharing', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gifs');
    }
};
