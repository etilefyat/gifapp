<?php

namespace App\Http\Livewire;

use App\Models\Gif as ModelsGif;
use Livewire\Component;
use Livewire\WithPagination;

class Gif extends Component
{
    use WithPagination;


    public $previouslyReportedThisIncident = [];

    public
        $incidentId,
        $survivorCode,
        $caseManagerCode,
        $dateOfReport,
        $dateOfIncident,
        $reportedBy,
        $dateOfBirth,
        $sex,
        $clanEthnicity,
        $countryOfOrigin,
        $nationality,
        $religion,
        $civilMaritalStatus,
        $numberAgeOfChildrenDependant,
        $occupation,
        $displacedPerson,
        $displacementStatusAtReport,
        $personWithDisability,
        $unaccompaniedOrSeparatedChild,
        $survivorLivesAlone,
        $survivorRelationWithCaretaker,
        $caretakerMaritalStatus,
        $caretakerOccupation,
        $detailsOfIncident,
        $incidentTimeOfDay,
        $incidentLocation,
        $incidentRegion,
        $incidentArea,
        $incidentCamp,
        $gbvType,
        $harmfulTraditionalPractice,
        $moneyGoodsBenefitsAndOrServicesExchanged,
        $typeOfAbduction,
        $typeNameHealthMedicalServices,
        $typeNamePsychosocialCounselingServices,
        $typeNamePoliceOtherSecurityActor,
        $typeNameLegalAssistanceServices,
        $typeNameLivelihoodsProgram,
        $typeNameSafeHouseShelter,
        $typeNameOtherPreviouslyReportedThisIncident,
        $previousGbvIncidents,
        $numberOfAllegedPrimaryPerpetrators,
        $allegedPerpetratorSex,
        $nationalityOfAllegedPerpetrator,
        $clanEthnicityOfAllegedPerpetrator,
        $allegedPerpetratorAgeGroup,
        $allegedPerpetratorRelationshipWithSurvivor,
        $mainOccupationOfAllegedPerpetrator,
        $referredToYouFrom,
        $safeHouseShelter,
        $safeHouseShelterReportedAppointmentDate,
        $safeHouseShelterNameLocation,
        $safeHouseShelterNotes,
        $healthMedicalServices,
        $healthMedicalServicesReportedAppointmentDate,
        $healthMedicalServicesNameLocation,
        $healthMedicalServicesFollowUpAppointmentDate,
        $healthMedicalServicesNotes,
        $psychosocialServices,
        $psychosocialServicesReportedAppointmentDate,
        $psychosocialServicesNameLocation,
        $psychosocialServicesNotes,
        $wantsLegalAction,
        $legalAssistanceServices,
        $legalAssistanceServicesReportedAppointmentDate,
        $legalAssistanceServicesNameLocation,
        $legalAssistanceServicesNotes,
        $policeOtherSecurityActor,
        $policeOtherSecurityActorReportedAppointmentDate,
        $policeOtherSecurityActorNameLocation,
        $policeOtherSecurityActorNotes,
        $livelihoodsProgram,
        $livelihoodsProgramReportedAppointmentDate,
        $livelihoodsProgramNameLocation,
        $livelihoodsProgramNotes,
        $emotionalStateAtBeginning,
        $emotionalStateAtEnd,
        $safeWhenLeaves,
        $whoGiveEmotionalSupport,
        $actionsTakenSafety,
        $otherRelevantInformation,
        $explainedConsequencesOfRapeClient,
        $explainedConsequencesOfRapeCaregiver,
        $consentGivenForInformationSharing;

    public function render()
    {
        $gifs = ModelsGif::latest()->paginate(5);

        return view('livewire.gif')->with('gifs', $gifs);
    }

    public function store()
    {
        $this->validate([
            'incidentId' => 'required',
            'dateOfReport' => 'required',
            'dateOfIncident' => 'required'
        ]);

        // dd(implode(', ',$this->previouslyReportedThisIncident));


        ModelsGif::create([
            'incidentId' => $this->incidentId,
            'survivorCode' => $this->survivorCode,
            'caseManagerCode' => $this->caseManagerCode,
            'dateOfReport' => $this->dateOfReport,
            'dateOfIncident' => $this->dateOfIncident,
            'reportedBy' => $this->reportedBy,
            'dateOfBirth' => $this->dateOfBirth,
            'sex' => $this->sex,
            'clanEthnicity' => $this->clanEthnicity,
            'countryOfOrigin' => $this->countryOfOrigin,
            'nationality' => $this->nationality,
            'religion' => $this->religion,
            'civilMaritalStatus' => $this->civilMaritalStatus,
            'numberAgeOfChildrenDependant' => $this->numberAgeOfChildrenDependant,
            'occupation' => $this->occupation,
            'displacedPerson' => $this->displacedPerson,
            'displacementStatusAtReport' => $this->displacementStatusAtReport,
            'personWithDisability' => $this->personWithDisability,
            'unaccompaniedOrSeparatedChild' => $this->unaccompaniedOrSeparatedChild,
            'survivorLivesAlone' => $this->survivorLivesAlone,
            'survivorRelationWithCaretaker' => $this->survivorRelationWithCaretaker,
            'caretakerMaritalStatus' => $this->caretakerMaritalStatus,
            'caretakerOccupation' => $this->caretakerOccupation,
            'detailsOfIncident' => $this->detailsOfIncident,
            'incidentTimeOfDay' => $this->incidentTimeOfDay,
            'incidentLocation' => $this->incidentLocation,
            'incidentRegion' => $this->incidentRegion,
            'incidentArea' => $this->incidentArea,
            'incidentCamp' => $this->incidentCamp,
            'gbvType' => $this->gbvType,
            'harmfulTraditionalPractice' => $this->harmfulTraditionalPractice,
            'moneyGoodsBenefitsAndOrServicesExchanged' => $this->moneyGoodsBenefitsAndOrServicesExchanged,
            'typeOfAbduction' => $this->typeOfAbduction,
            'previouslyReportedThisIncident' => implode(', ',$this->previouslyReportedThisIncident),
            'typeNameHealthMedicalServices' => $this->typeNameHealthMedicalServices,
            'typeNamePsychosocialCounselingServices' => $this->typeNamePsychosocialCounselingServices,
            'typeNamePoliceOtherSecurityActor' => $this->typeNamePoliceOtherSecurityActor,
            'typeNameLegalAssistanceServices' => $this->typeNameLegalAssistanceServices,
            'typeNameLivelihoodsProgram' => $this->typeNameLivelihoodsProgram,
            'typeNameSafeHouseShelter' => $this->typeNameSafeHouseShelter,
            'typeNameOtherPreviouslyReportedThisIncident' => $this->typeNameOtherPreviouslyReportedThisIncident,
            'previousGbvIncidents' => $this->previousGbvIncidents,
            'numberOfAllegedPrimaryPerpetrators' => $this->numberOfAllegedPrimaryPerpetrators,
            'allegedPerpetratorSex' => $this->allegedPerpetratorSex,
            'nationalityOfAllegedPerpetrator' => $this->nationalityOfAllegedPerpetrator,
            'clanEthnicityOfAllegedPerpetrator' => $this->clanEthnicityOfAllegedPerpetrator,
            'allegedPerpetratorAgeGroup' => $this->allegedPerpetratorAgeGroup,
            'allegedPerpetratorRelationshipWithSurvivor' => $this->allegedPerpetratorRelationshipWithSurvivor,
            'mainOccupationOfAllegedPerpetrator' => $this->mainOccupationOfAllegedPerpetrator,
            'referredToYouFrom' => $this->referredToYouFrom,
            'safeHouseShelter' => $this->safeHouseShelter,
            'safeHouseShelterReportedAppointmentDate' => $this->safeHouseShelterReportedAppointmentDate,
            'safeHouseShelterNameLocation' => $this->safeHouseShelterNameLocation,
            'safeHouseShelterNotes' => $this->safeHouseShelterNotes,
            'healthMedicalServices' => $this->healthMedicalServices,
            'healthMedicalServicesReportedAppointmentDate' => $this->healthMedicalServicesReportedAppointmentDate,
            'healthMedicalServicesNameLocation' => $this->healthMedicalServicesNameLocation,
            'healthMedicalServicesFollowUpAppointmentDate' => $this->healthMedicalServicesFollowUpAppointmentDate,
            'healthMedicalServicesNotes' => $this->healthMedicalServicesNotes,
            'psychosocialServices' => $this->psychosocialServices,
            'psychosocialServicesReportedAppointmentDate' => $this->psychosocialServicesReportedAppointmentDate,
            'psychosocialServicesNameLocation' => $this->psychosocialServicesNameLocation,
            'psychosocialServicesNotes' => $this->psychosocialServicesNotes,
            'wantsLegalAction' => $this->wantsLegalAction,
            'legalAssistanceServices' => $this->legalAssistanceServices,
            'legalAssistanceServicesReportedAppointmentDate' => $this->legalAssistanceServicesReportedAppointmentDate,
            'legalAssistanceServicesNameLocation' => $this->legalAssistanceServicesNameLocation,
            'legalAssistanceServicesNotes' => $this->legalAssistanceServicesNotes,
            'policeOtherSecurityActor' => $this->policeOtherSecurityActor,
            'policeOtherSecurityActorReportedAppointmentDate' => $this->policeOtherSecurityActorReportedAppointmentDate,
            'policeOtherSecurityActorNameLocation' => $this->policeOtherSecurityActorNameLocation,
            'policeOtherSecurityActorNotes' => $this->policeOtherSecurityActorNotes,
            'livelihoodsProgram' => $this->livelihoodsProgram,
            'livelihoodsProgramReportedAppointmentDate' => $this->livelihoodsProgramReportedAppointmentDate,
            'livelihoodsProgramNameLocation' => $this->livelihoodsProgramNameLocation,
            'livelihoodsProgramNotes' => $this->livelihoodsProgramNotes,
            'emotionalStateAtBeginning' => $this->emotionalStateAtBeginning,
            'emotionalStateAtEnd' => $this->emotionalStateAtEnd,
            'safeWhenLeaves' => $this->safeWhenLeaves,
            'whoGiveEmotionalSupport' => $this->whoGiveEmotionalSupport,
            'actionsTakenSafety' => $this->actionsTakenSafety,
            'otherRelevantInformation' => $this->otherRelevantInformation,
            'explainedConsequencesOfRapeClient' => $this->explainedConsequencesOfRapeClient,
            'explainedConsequencesOfRapeCaregiver' => $this->explainedConsequencesOfRapeCaregiver,
            'consentGivenForInformationSharing' => $this->consentGivenForInformationSharing,
        ]);


        $this->reset();
    }
}
