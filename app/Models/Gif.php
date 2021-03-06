<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gif extends Model
{
    use HasFactory;

    protected $fillable = [
        'incidentId',
        'survivorCode',
        'caseManagerCode',
        'dateOfReport',
        'dateOfIncident',
        'reportedBy',
        'dateOfBirth',
        'sex',
        'clanEthnicity',
        'countryOfOrigin',
        'nationality',
        'religion',
        'civilMaritalStatus',
        'numberAgeOfChildrenDependant',
        'occupation',
        'displacedPerson',
        'displacementStatusAtReport',
        'personWithDisability',
        'unaccompaniedOrSeparatedChild',
        'survivorLivesAlone',
        'survivorRelationWithCaretaker',
        'caretakerMaritalStatus',
        'caretakerOccupation',
        'detailsOfIncident',
        'incidentTimeOfDay',
        'incidentLocation',
        'incidentRegion',
        'incidentArea',
        'incidentCamp',
        'gbvType',
        'harmfulTraditionalPractice',
        'moneyGoodsBenefitsAndOrServicesExchanged',
        'typeOfAbduction',
        'previouslyReportedThisIncident',
        'typeNameHealthMedicalServices',
        'typeNamePsychosocialCounselingServices',
        'typeNamePoliceOtherSecurityActor',
        'typeNameLegalAssistanceServices',
        'typeNameLivelihoodsProgram',
        'typeNameSafeHouseShelter',
        'typeNameOtherPreviouslyReportedThisIncident',
        'previousGbvIncidents',
        'numberOfAllegedPrimaryPerpetrators',
        'allegedPerpetratorSex',
        'nationalityOfAllegedPerpetrator',
        'clanEthnicityOfAllegedPerpetrator',
        'allegedPerpetratorAgeGroup',
        'allegedPerpetratorRelationshipWithSurvivor',
        'mainOccupationOfAllegedPerpetrator',
        'referredToYouFrom',
        'safeHouseShelter',
        'safeHouseShelterReportedAppointmentDate',
        'safeHouseShelterNameLocation',
        'safeHouseShelterNotes',
        'healthMedicalServices',
        'healthMedicalServicesReportedAppointmentDate',
        'healthMedicalServicesNameLocation',
        'healthMedicalServicesFollowUpAppointmentDate',
        'healthMedicalServicesNotes',
        'psychosocialServices',
        'psychosocialServicesReportedAppointmentDate',
        'psychosocialServicesNameLocation',
        'psychosocialServicesNotes',
        'wantsLegalAction',
        'legalAssistanceServices',
        'legalAssistanceServicesReportedAppointmentDate',
        'legalAssistanceServicesNameLocation',
        'legalAssistanceServicesNotes',
        'policeOtherSecurityActor',
        'policeOtherSecurityActorReportedAppointmentDate',
        'policeOtherSecurityActorNameLocation',
        'policeOtherSecurityActorNotes',
        'livelihoodsProgram',
        'livelihoodsProgramReportedAppointmentDate',
        'livelihoodsProgramNameLocation',
        'livelihoodsProgramNotes',
        'emotionalStateAtBeginning',
        'emotionalStateAtEnd',
        'safeWhenLeaves',
        'whoGiveEmotionalSupport',
        'actionsTakenSafety',
        'otherRelevantInformation',
        'explainedConsequencesOfRapeClient',
        'explainedConsequencesOfRapeCaregiver',
        'consentGivenForInformationSharing',
    ];
}
