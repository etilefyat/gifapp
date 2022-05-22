<div x-data="{ gifmodal: false }">
    {{-- table --}}
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="ml-2 mr-2 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <div class="sm:flex block items-center justify-end mt-4">
                                    <x-jet-button @click="gifmodal = !gifmodal" class="ml-4">
                                        {{ __('Add New') }}
                                    </x-jet-button>
                                </div>
                                <table class="w-full divide-y divide-gray-200 mt-2">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ 'Incident ID' }}
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ 'Survivor code' }}
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                {{ 'Caseworker code' }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($gifs as $gif)
                                        <tr class="hover:bg-gray-100">
                                            <td class="px-6 py-2 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    {{ $gif->incidentId }}
                                                </div>
                                            </td>
                                            <td class="px-6 py-2 whitespace-nowrap">
                                                <div class="text-sm text-gray-900">{{ $gif->survivorCode }}
                                                </div>
                                                <div class="text-sm text-gray-500">Optimization</div>
                                            </td>
                                            <td class="px-6 py-2 whitespace-nowrap">
                                                <span
                                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    {{ $gif->caseManagerCode }}
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="bg-white px-4 py-1 justify-between border-t border-gray-200 sm:px-6">
                                    {{ $gifs->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- table --}}

    {{-- modal --}}
    <div x-show="gifmodal" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-25 transition-opacity"></div>

        <div class="fixed z-10 inset-0 overflow-y-auto">
            {{-- content start--}}
                        <div class="sm:flex block items-center justify-end mt-4">
                            <x-jet-button @click="gifmodal = !gifmodal" class="fixed ml-4">
                                {{ __('x') }}
                            </x-jet-button>
                        </div>
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="divide-y py-2 align-middle inline-block min-w-full px-4 sm:px-6 lg:px-8">
                                    <form class="px-4 overflow-hidden sm:rounded-lg">
                                        @csrf

                                        <div class="mt-4 sm:flex block justify-between gap-4">
                                            <div class="w-full">
                                                <x-jet-label for="incidentId" value="{{ __('Incident ID') }}" />
                                                <x-jet-input id="incidentId" type="text" class="mt-1 block w-full" wire:model.defer="incidentId" autocomplete="incidentId" />
                                                <x-jet-input-error for="incidentId" class="mt-2" />
                                            </div>

                                            <div class="w-full">
                                                <x-jet-label for="survivorCode" value="{{ __('Survivor code') }}" />
                                                <x-jet-input id="survivorCode" type="text" class="mt-1 block w-full" wire:model.defer="survivorCode" autocomplete="survivorCode" />
                                                <x-jet-input-error for="survivorCode" class="mt-2" />
                                            </div>

                                            <div class="w-full">
                                                <x-jet-label for="caseManagerCode" value="{{ __('Caseworker code') }}" />
                                                <x-jet-input id="caseManagerCode" type="text" class="mt-1 block w-full" wire:model.defer="caseManagerCode" autocomplete="caseManagerCode" />
                                                <x-jet-input-error for="caseManagerCode" class="mt-2" />
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div class="sm:flex block justify-between gap-4">
                                            <div class="w-full">
                                                <x-jet-label for="dateOfReport" value="{{ __('Date of interview (day/month/year)') }}" />
                                                <x-jet-input id="dateOfReport" type="date" class="mt-1 block w-full" wire:model.defer="dateOfReport" autocomplete="dateOfReport" />
                                                <x-jet-input-error for="dateOfReport" class="mt-2" />
                                            </div>

                                            <div class="w-full">
                                                <x-jet-label for="dateOfIncident" value="{{ __('Date of incident (day/month/year)') }}" />
                                                <x-jet-input id="dateOfIncident" type="date" class="mt-1 block w-full" wire:model.defer="dateOfIncident" autocomplete="dateOfIncident" />
                                                <x-jet-input-error for="dateOfIncident" class="mt-2" />
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div>
                                            <div class="flex items-center">
                                                <x-jet-input id="survivor" name="reportedBy" value="survivor" type="radio" class="block" wire:model.defer="reportedBy" autocomplete="reportedBy" />
                                                <x-jet-label class="ml-3" for="survivor" value="{{ __('Reported by the survivor or reported by survivor’s escort and survivor is present at reporting*
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        (These incidents will be entered into the Incident Recorder)') }}" />
                                            </div>
                                            <div class="flex items-center mt-2">
                                                <x-jet-input id="someone" name="reportedBy" value="someone" type="radio" class="block" wire:model.defer="reportedBy" autocomplete="reportedBy" />
                                                <x-jet-label class="ml-3" for="someone" value="{{ __('Reported by someone other than the survivor and survivor is not present at reporting
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        (These incidents will not be entered into the Incident Recorder)') }}" />
                                            </div>
                                            <x-jet-input-error for="reportedBy" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div class="sm:flex block justify-between gap-4">
                                            <div class="w-full">
                                                <x-jet-label for="dateOfBirth" value="{{ __('Date of birth (approximate if necessary)') }}" />
                                                <x-jet-input id="dateOfBirth" type="date" class="mt-1 block w-full" wire:model.defer="dateOfBirth" autocomplete="dateOfBirth" />
                                                <x-jet-input-error for="dateOfBirth" class="mt-2" />
                                            </div>

                                            <div class="w-full">
                                                <x-jet-label for="sex" value="{{ __('Sex') }}" />
                                                <select id="sex" name="sex" wire:model.defer="sex" autocomplete="sex" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option value="null">Sex</option>
                                                    <option value="female">Female</option>
                                                    <option value="male">Male</option>
                                                    <option value="inter-sex">Inter-Sex</option>
                                                </select>
                                                <x-jet-input-error for="sex" class="mt-2" />
                                            </div>

                                            <div class="w-full">
                                                <x-jet-label for="clanEthnicity" value="{{ __('Clan or ethnicity') }}" />
                                                <x-jet-input id="clanEthnicity" type="text" class="mt-1 block w-full" wire:model.defer="clanEthnicity" autocomplete="clanEthnicity" />
                                                <x-jet-input-error for="clanEthnicity" class="mt-2" />
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div>
                                            <x-jet-label for="countryOfOrigin" value="{{ __('Country of origin') }}" />
                                            <x-jet-input id="countryOfOrigin" type="text" class="mt-1 block w-full" wire:model.defer="countryOfOrigin" autocomplete="countryOfOrigin" />
                                            <x-jet-input-error for="countryOfOrigin" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div class="sm:flex block justify-between gap-4">
                                            <div class="w-full">
                                                <x-jet-label for="nationality" value="{{ __('Nationality (If different than country of origin)') }}" />
                                                <x-jet-input id="nationality" type="text" class="mt-1 block w-full" wire:model.defer="nationality" autocomplete="nationality" />
                                                <x-jet-input-error for="nationality" class="mt-2" />
                                            </div>

                                            <div class="w-full">
                                                <x-jet-label for="religion" value="{{ __('Religion') }}" />
                                                <x-jet-input id="religion" type="text" class="mt-1 block w-full" wire:model.defer="religion" autocomplete="religion" />
                                                <x-jet-input-error for="religion" class="mt-2" />
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div>
                                            <x-jet-label for="civilMaritalStatus" value="{{ __('Current civil / marital status') }}" />
                                            <div x-data="{ otherCivilMaritalStatus: false }" class="mt-2 flex items-center gap-6">
                                                <div class="flex items-center">
                                                    <x-jet-input @click="otherCivilMaritalStatus = false" id="single" name="civilMaritalStatus" value="Single" type="radio" class="block" wire:model.defer="civilMaritalStatus" autocomplete="civilMaritalStatus" />
                                                    <x-jet-label class="ml-3" for="single" value="{{ __('Single') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input @click="otherCivilMaritalStatus = false" id="marriedCohabitating" name="civilMaritalStatus" value="Married / Cohabitating" type="radio" class="block" wire:model.defer="civilMaritalStatus" autocomplete="civilMaritalStatus" />
                                                    <x-jet-label class="ml-3" for="marriedCohabitating" value="{{ __('Married / Cohabitating') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input @click="otherCivilMaritalStatus = false" id="divorcedSeparated" name="civilMaritalStatus" value="Divorced / Separated" type="radio" class="block" wire:model.defer="civilMaritalStatus" autocomplete="civilMaritalStatus" />
                                                    <x-jet-label class="ml-3" for="divorcedSeparated" value="{{ __('Divorced / Separated') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input @click="otherCivilMaritalStatus = false" id="widowed" name="civilMaritalStatus" value="Widowed" type="radio" class="block" wire:model.defer="civilMaritalStatus" autocomplete="civilMaritalStatus" />
                                                    <x-jet-label class="ml-3" for="widowed" value="{{ __('Widowed') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input @click="otherCivilMaritalStatus = true" id="otherCivilMaritalStatus" name="civilMaritalStatus" type="radio" class="block" autocomplete="civilMaritalStatus" />
                                                    <x-jet-label class="ml-3" for="otherCivilMaritalStatus" value="{{ __('Other (specify)') }}" />
                                                    <x-jet-input x-show="otherCivilMaritalStatus" id="civilMaritalStatus" type="text" class="block w-full" wire:model.defer="civilMaritalStatus" autocomplete="civilMaritalStatus" />
                                                </div>
                                            </div>
                                            <x-jet-input-error for="civilMaritalStatus" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div>
                                            <x-jet-label for="numberAgeOfChildrenDependant" value="{{ __('Number and age of children and other dependants') }}" />
                                            <x-jet-input id="numberAgeOfChildrenDependant" type="text" class="mt-1 block w-full" wire:model.defer="numberAgeOfChildrenDependant" autocomplete="numberAgeOfChildrenDependant" />
                                            <x-jet-input-error for="numberAgeOfChildrenDependant" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div>
                                            <x-jet-label for="occupation" value="{{ __('Occupation') }}" />
                                            <x-jet-input id="occupation" type="text" class="mt-1 block w-full" wire:model.defer="occupation" autocomplete="occupation" />
                                            <x-jet-input-error for="occupation" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div x-data=" { displacedPerson: false }">
                                            <div class="mt-4 flex items-center gap-6">
                                                <x-jet-label for="displacedPerson" value="{{ __('Is the client a displaced person?') }}" />
                                                <div class="flex items-center gap-6">
                                                    <div class="flex items-center">
                                                        <x-jet-input @click="displacedPerson = true" id="yesDisplacedPerson" name="displacedPerson" value="Yes" type="radio" class="block" wire:model.defer="displacedPerson" autocomplete="displacedPerson" />
                                                        <x-jet-label class="ml-3" for="yesDisplacedPerson" value="{{ __('Yes') }}" />
                                                    </div>
                                                    <div class="flex items-center">
                                                        <x-jet-input @click="displacedPerson = false" id="noDisplacedPerson" name="displacedPerson" value="No" type="radio" class="block" wire:model.defer="displacedPerson" autocomplete="displacedPerson" />
                                                        <x-jet-label class="ml-3" for="noDisplacedPerson" value="{{ __('No') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div x-show="displacedPerson" class="mt-4">
                                                <x-jet-label for="displacementStatusAtReport" value="{{ __('If yes, what is the displacement status at time of report*:') }}" />
                                                <div x-data="{ otherDisplacementStatusAtReport: false }" class="mt-2 flex items-center gap-6">
                                                    <div class="flex items-center">
                                                        <x-jet-input @click="otherDisplacementStatusAtReport = false" id="resident" name="displacementStatusAtReport" value="Resident" type="radio" class="block" wire:model.defer="displacementStatusAtReport" autocomplete="displacementStatusAtReport" />
                                                        <x-jet-label class="ml-3" for="resident" value="{{ __('Resident') }}" />
                                                    </div>
                                                    <div class="flex items-center">
                                                        <x-jet-input @click="otherDisplacementStatusAtReport = false" id="returnee" name="displacementStatusAtReport" value="Returnee" type="radio" class="block" wire:model.defer="displacementStatusAtReport" autocomplete="displacementStatusAtReport" />
                                                        <x-jet-label class="ml-3" for="returnee" value="{{ __('Returnee') }}" />
                                                    </div>
                                                    <div class="flex items-center">
                                                        <x-jet-input @click="otherDisplacementStatusAtReport = false" id="iDP" name="displacementStatusAtReport" value="IDP" type="radio" class="block" wire:model.defer="displacementStatusAtReport" autocomplete="displacementStatusAtReport" />
                                                        <x-jet-label class="ml-3" for="iDP" value="{{ __('IDP') }}" />
                                                    </div>
                                                    <div class="flex items-center">
                                                        <x-jet-input @click="otherDisplacementStatusAtReport = false" id="foreignNational" name="displacementStatusAtReport" value="Foreign National" type="radio" class="block" wire:model.defer="displacementStatusAtReport" autocomplete="displacementStatusAtReport" />
                                                        <x-jet-label class="ml-3" for="foreignNational" value="{{ __('Foreign National') }}" />
                                                    </div>
                                                    <div class="flex items-center">
                                                        <x-jet-input @click="otherDisplacementStatusAtReport = false" id="refugee" name="displacementStatusAtReport" value="Refugee" type="radio" class="block" wire:model.defer="displacementStatusAtReport" autocomplete="displacementStatusAtReport" />
                                                        <x-jet-label class="ml-3" for="refugee" value="{{ __('Refugee') }}" />
                                                    </div>
                                                    <div class="flex items-center">
                                                        <x-jet-input @click="otherDisplacementStatusAtReport = false" id="asylumSeeker" name="displacementStatusAtReport" value="Asylum Seeker" type="radio" class="block" wire:model.defer="displacementStatusAtReport" autocomplete="displacementStatusAtReport" />
                                                        <x-jet-label class="ml-3" for="asylumSeeker" value="{{ __('Asylum Seeker') }}" />
                                                    </div>
                                                    <div class="flex items-center">
                                                        <x-jet-input @click="otherDisplacementStatusAtReport = false" id="statelessPerson" name="displacementStatusAtReport" value="Stateless Person" type="radio" class="block" wire:model.defer="displacementStatusAtReport" autocomplete="displacementStatusAtReport" />
                                                        <x-jet-label class="ml-3" for="statelessPerson" value="{{ __('Stateless Person') }}" />
                                                    </div>
                                                    <div class="flex items-center">
                                                        <x-jet-input @click="otherDisplacementStatusAtReport = true" id="otherDisplacementStatusAtReport" name="displacementStatusAtReport" type="radio" class="block" autocomplete="displacementStatusAtReport" />
                                                        <x-jet-label class="ml-3" for="otherDisplacementStatusAtReport" value="{{ __('Other (specify)') }}" />
                                                        <x-jet-input x-show="otherDisplacementStatusAtReport" id="displacementStatusAtReport" type="text" class="block w-full" wire:model.defer="displacementStatusAtReport" autocomplete="displacementStatusAtReport" />
                                                    </div>
                                                </div>
                                                <x-jet-input-error for="displacementStatusAtReport" class="mt-2" />
                                            </div>
                                            <x-jet-input-error for="displacedPerson" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div class="flex items-center gap-6">
                                            <x-jet-label for="personWithDisability" value="{{ __('Is the client a Person with Disabilities?') }}" />
                                            <div class="flex items-center gap-6">
                                                <div class="flex items-center">
                                                    <x-jet-input id="noPersonWithDisability" name="personWithDisability" value="no" type="radio" class="block" wire:model.defer="personWithDisability" autocomplete="personWithDisability" />
                                                    <x-jet-label class="ml-3" for="noPersonWithDisability" value="{{ __('No') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="mentalDisability" name="personWithDisability" value="Mental Disability" type="radio" class="block" wire:model.defer="personWithDisability" autocomplete="personWithDisability" />
                                                    <x-jet-label class="ml-3" for="mentalDisability" value="{{ __('Mental Disability') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="physicalDisability" name="personWithDisability" value="Physical Disability" type="radio" class="block" wire:model.defer="personWithDisability" autocomplete="personWithDisability" />
                                                    <x-jet-label class="ml-3" for="physicalDisability" value="{{ __('Physical Disability') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="both" name="personWithDisability" value="Both" type="radio" class="block" wire:model.defer="personWithDisability" autocomplete="personWithDisability" />
                                                    <x-jet-label class="ml-3" for="both" value="{{ __('Both') }}" />
                                                </div>
                                            </div>
                                            <x-jet-input-error for="personWithDisability" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div>
                                            <x-jet-label for="unaccompaniedOrSeparatedChild" value="{{ __('Is the client an Unaccompanied Minor, Separated Child, or Other Vulnerable Child?') }}" />
                                            <div class="mt-2 flex items-center gap-6">
                                                <div class="flex items-center">
                                                    <x-jet-input id="no" name="unaccompaniedOrSeparatedChild" value="no" type="radio" class="block" wire:model.defer="unaccompaniedOrSeparatedChild" autocomplete="unaccompaniedOrSeparatedChild" />
                                                    <x-jet-label class="ml-3" for="no" value="{{ __('No') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="unaccompaniedMinor" name="unaccompaniedOrSeparatedChild" value="Unaccompanied Minor" type="radio" class="block" wire:model.defer="unaccompaniedOrSeparatedChild" autocomplete="unaccompaniedOrSeparatedChild" />
                                                    <x-jet-label class="ml-3" for="unaccompaniedMinor" value="{{ __('Unaccompanied Minor') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="separatedChild" name="unaccompaniedOrSeparatedChild" value="Separated Child" type="radio" class="block" wire:model.defer="unaccompaniedOrSeparatedChild" autocomplete="unaccompaniedOrSeparatedChild" />
                                                    <x-jet-label class="ml-3" for="separatedChild" value="{{ __('Separated Child') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="otherVulnerableChild" name="unaccompaniedOrSeparatedChild" value="Other Vulnerable Child" type="radio" class="block" wire:model.defer="unaccompaniedOrSeparatedChild" autocomplete="unaccompaniedOrSeparatedChild" />
                                                    <x-jet-label class="ml-3" for="otherVulnerableChild" value="{{ __('Other Vulnerable Child') }}" />
                                                </div>
                                            </div>
                                            <x-jet-input-error for="unaccompaniedOrSeparatedChild" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div x-data=" { survivorLivesAlone: false }">
                                            <div class="mt-4 flex items-center gap-6">
                                                <x-jet-label for="survivorLivesAlone" value="{{ __('If the survivor is a child (less than 18yrs) does he/she live alone?') }}" />
                                                <div class="flex items-center gap-6">
                                                    <div class="flex items-center">
                                                        <x-jet-input @click="survivorLivesAlone = false" id="yesSurvivorLivesAlone" name="survivorLivesAlone" value="Yes" type="radio" class="block" wire:model.defer="survivorLivesAlone" autocomplete="survivorLivesAlone" />
                                                        <x-jet-label class="ml-3" for="yesSurvivorLivesAlone" value="{{ __('Yes') }}" />
                                                    </div>
                                                    <div class="flex items-center">
                                                        <x-jet-input @click="survivorLivesAlone = true" id="noSurvivorLivesAlone" name="survivorLivesAlone" value="No" type="radio" class="block" wire:model.defer="survivorLivesAlone" autocomplete="survivorLivesAlone" />
                                                        <x-jet-label class="ml-3" for="noSurvivorLivesAlone" value="{{ __('No') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div x-show="survivorLivesAlone" class="mt-4">
                                                <div class="mt-4">
                                                    <x-jet-label for="survivorRelationWithCaretaker" value="{{ __('If the survivor lives with someone, what is the relation between her/him and the caretaker?') }}" />
                                                    <div x-data="{ otherSurvivorRelationWithCaretaker: false }" class="mt-2 flex items-center gap-6">
                                                        <div class="flex items-center">
                                                            <x-jet-input @click="otherSurvivorRelationWithCaretaker = false" id="parentGuardian" name="survivorRelationWithCaretaker" value="Parent / Guardian" type="radio" class="block" wire:model.defer="survivorRelationWithCaretaker" autocomplete="survivorRelationWithCaretaker" />
                                                            <x-jet-label class="ml-3" for="parentGuardian" value="{{ __('Parent / Guardian') }}" />
                                                        </div>
                                                        <div class="flex items-center">
                                                            <x-jet-input @click="otherSurvivorRelationWithCaretaker = false" id="relative" name="survivorRelationWithCaretaker" value="Relative" type="radio" class="block" wire:model.defer="survivorRelationWithCaretaker" autocomplete="survivorRelationWithCaretaker" />
                                                            <x-jet-label class="ml-3" for="relative" value="{{ __('Relative') }}" />
                                                        </div>
                                                        <div class="flex items-center">
                                                            <x-jet-input @click="otherSurvivorRelationWithCaretaker = false" id="spouseCohabitating" name="survivorRelationWithCaretaker" value="Spouse / Cohabitating" type="radio" class="block" wire:model.defer="survivorRelationWithCaretaker" autocomplete="survivorRelationWithCaretaker" />
                                                            <x-jet-label class="ml-3" for="spouseCohabitating" value="{{ __('Spouse / Cohabitating') }}" />
                                                        </div>
                                                        <div class="flex items-center">
                                                            <x-jet-input @click="otherSurvivorRelationWithCaretaker = true" id="otherSurvivorRelationWithCaretaker" name="survivorRelationWithCaretaker" type="radio" class="block" autocomplete="survivorRelationWithCaretaker" />
                                                            <x-jet-label class="ml-3" for="otherSurvivorRelationWithCaretaker" value="{{ __('Other') }}" />
                                                            <x-jet-input x-show="otherSurvivorRelationWithCaretaker" id="survivorRelationWithCaretaker" type="text" class="block w-full" wire:model.defer="survivorRelationWithCaretaker" autocomplete="survivorRelationWithCaretaker" />
                                                        </div>
                                                    </div>
                                                    <x-jet-input-error for="survivorRelationWithCaretaker" class="mt-2" />
                                                </div>

                                                <div class="mt-4">
                                                    <x-jet-label for="caretakerMaritalStatus" value="{{ __('What is the caretaker’s current marital status?') }}" />
                                                    <div class="flex items-center gap-6 mt-2">
                                                        <div class="flex items-center">
                                                            <x-jet-input id="singleCaretaker" name="caretakerMaritalStatus" value="Single" type="radio" class="block" wire:model.defer="caretakerMaritalStatus" autocomplete="caretakerMaritalStatus" />
                                                            <x-jet-label class="ml-3" for="singleCaretaker" value="{{ __('Single') }}" />
                                                        </div>
                                                        <div class="flex items-center">
                                                            <x-jet-input id="marriedCohabitatingCaretaker" name="caretakerMaritalStatus" value="Married / Cohabitating" type="radio" class="block" wire:model.defer="caretakerMaritalStatus" autocomplete="caretakerMaritalStatus" />
                                                            <x-jet-label class="ml-3" for="marriedCohabitatingCaretaker" value="{{ __('Married / Cohabitating') }}" />
                                                        </div>
                                                        <div class="flex items-center">
                                                            <x-jet-input id="divorcedSeparatedCaretaker" name="caretakerMaritalStatus" value="Divorced / Separated" type="radio" class="block" wire:model.defer="caretakerMaritalStatus" autocomplete="caretakerMaritalStatus" />
                                                            <x-jet-label class="ml-3" for="divorcedSeparatedCaretaker" value="{{ __('Divorced / Separated') }}" />
                                                        </div>
                                                        <div class="flex items-center">
                                                            <x-jet-input id="widowedCaretaker" name="caretakerMaritalStatus" value="Widowed" type="radio" class="block" wire:model.defer="caretakerMaritalStatus" autocomplete="caretakerMaritalStatus" />
                                                            <x-jet-label class="ml-3" for="widowedCaretaker" value="{{ __('Widowed') }}" />
                                                        </div>
                                                        <div class="flex items-center">
                                                            <x-jet-input id="unknownNotApplicableCaretaker" name="caretakerMaritalStatus" value="Unknown / Not Applicable" type="radio" class="block" wire:model.defer="caretakerMaritalStatus" autocomplete="caretakerMaritalStatus" />
                                                            <x-jet-label class="ml-3" for="unknownNotApplicableCaretaker" value="{{ __('Unknown / Not Applicable') }}" />
                                                        </div>
                                                    </div>
                                                    <x-jet-input-error for="caretakerMaritalStatus" class="mt-2" />
                                                </div>

                                                <div class="mt-4">
                                                    <x-jet-label for="caretakerOccupation" value="{{ __('What is the caretaker’s primary occupation') }}" />
                                                    <x-jet-input id="caretakerOccupation" type="text" class="mt-1 block w-full" wire:model.defer="caretakerOccupation" autocomplete="caretakerOccupation" />
                                                    <x-jet-input-error for="caretakerOccupation" class="mt-2" />
                                                </div>
                                            </div>
                                            <x-jet-input-error for="survivorLivesAlone" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div>
                                            <x-jet-label for="detailsOfIncident" value="{{ __('Account of the incident/Description of the incident (summarize the details of the incident in client’s words)') }}" />
                                            <textarea wire:model.defer="detailsOfIncident" id="detailsOfIncident" name="detailsOfIncident" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                                            <x-jet-input-error for="detailsOfIncident" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div class="sm:flex block justify-between gap-4">
                                            <div class="w-full">
                                                <x-jet-label for="incidentTimeOfDay" value="{{ __('Time of day that incident took place') }}" />
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input id="morning" name="incidentTimeOfDay" value="Morning (sunrise to noon)" type="radio" class="block" wire:model.defer="incidentTimeOfDay" autocomplete="incidentTimeOfDay" />
                                                    <x-jet-label class="ml-3" for="morning" value="{{ __('Morning (sunrise to noon)') }}" />
                                                </div>
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input id="afternoon" name="incidentTimeOfDay" value="Afternoon (noon to sunset)" type="radio" class="block" wire:model.defer="incidentTimeOfDay" autocomplete="incidentTimeOfDay" />
                                                    <x-jet-label class="ml-3" for="afternoon" value="{{ __('Afternoon (noon to sunset)') }}" />
                                                </div>
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input id="eveningNight" name="incidentTimeOfDay" value="Evening/night (sunset to sunrise)" type="radio" class="block" wire:model.defer="incidentTimeOfDay" autocomplete="incidentTimeOfDay" />
                                                    <x-jet-label class="ml-3" for="eveningNight" value="{{ __('Evening/night (sunset to sunrise)') }}" />
                                                </div>
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input id="unknownNotApplicable" name="incidentTimeOfDay" value="Unknown/Not Applicable" type="radio" class="block" wire:model.defer="incidentTimeOfDay" autocomplete="incidentTimeOfDay" />
                                                    <x-jet-label class="ml-3" for="unknownNotApplicable" value="{{ __('Unknown/Not Applicable') }}" />
                                                </div>
                                                <x-jet-input-error for="incidentTimeOfDay" class="mt-2" />
                                            </div>

                                            <div class="w-full">
                                                <x-jet-label for="incidentLocation" value="{{ __('Incident location / Where the incident took place*:
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                (Customize location options by adding new, or removing tick boxes according to your location)') }}" />
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input id="bushForest" name="incidentLocation" value="Bush / Forest" type="radio" class="block" wire:model.defer="incidentLocation" autocomplete="incidentLocation" />
                                                    <x-jet-label class="ml-3" for="bushForest" value="{{ __('Bush / Forest') }}" />
                                                </div>
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input id="gardenCultivatedField" name="incidentLocation" value="Garden / Cultivated Field" type="radio" class="block" wire:model.defer="incidentLocation" autocomplete="incidentLocation" />
                                                    <x-jet-label class="ml-3" for="gardenCultivatedField" value="{{ __('Garden / Cultivated Field') }}" />
                                                </div>
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input id="school" name="incidentLocation" value="School" type="radio" class="block" wire:model.defer="incidentLocation" autocomplete="incidentLocation" />
                                                    <x-jet-label class="ml-3" for="school" value="{{ __('School') }}" />
                                                </div>
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input id="road" name="incidentLocation" value="Road" type="radio" class="block" wire:model.defer="incidentLocation" autocomplete="incidentLocation" />
                                                    <x-jet-label class="ml-3" for="road" value="{{ __('Road') }}" />
                                                </div>
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input id="clientsHome" name="incidentLocation" value="Clients Home" type="radio" class="block" wire:model.defer="incidentLocation" autocomplete="incidentLocation" />
                                                    <x-jet-label class="ml-3" for="clientsHome" value="{{ __('Client’s Home') }}" />
                                                </div>
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input id="perpetratorsHome" name="incidentLocation" value="Perpetrators Home" type="radio" class="block" wire:model.defer="incidentLocation" autocomplete="incidentLocation" />
                                                    <x-jet-label class="ml-3" for="perpetratorsHome" value="{{ __('Perpetrator’s Home') }}" />
                                                </div>
                                                <div x-data="{ otherIncidentLocation: false }" class="mt-2 flex items-center">
                                                    <x-jet-input @click="otherIncidentLocation = !otherIncidentLocation" id="otherIncidentLocation" name="incidentLocation" value="Other (give details)" type="radio" class="block" autocomplete="incidentLocation" />
                                                    <x-jet-label class="ml-3" for="otherIncidentLocation" value="{{ __('Other (give details)') }}" />
                                                    <x-jet-input x-show="otherIncidentLocation" id="otherIncidentLocation" type="text" class="block w-full" wire:model.defer="incidentLocation" autocomplete="incidentLocation" />
                                                </div>
                                                <x-jet-input-error for="incidentLocation" class="mt-2" />
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div class="sm:flex block justify-between gap-4">
                                            <div class="w-full">
                                                <x-jet-label for="incidentRegion" value="{{ __('Region where incident occurred') }}" />
                                                <select id="incidentRegion" name="incidentRegion" wire:model.defer="incidentRegion" autocomplete="incidentRegion" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option value="null">Region</option>
                                                    <option value="01">01-Barima Waini</option>
                                                    <option value="02">02-Pomeroon-Supenaam</option>
                                                    <option value="03">03-Essequibo Islands-West Demerara</option>
                                                    <option value="04">04-Demerara-Mahaica</option>
                                                    <option value="05">05-Mahaica Berbice</option>
                                                    <option value="06">06-East-Berbice-Corentyne</option>
                                                    <option value="07">07-Cuyuni-Mazaruni</option>
                                                    <option value="08">08-Potaro-Siparuni</option>
                                                    <option value="09">09-Upper Takutu-Upper Essequibo</option>
                                                    <option value="10">10-Upper Demerara-Berbice</option>
                                                </select>
                                                <x-jet-input-error for="incidentRegion" class="mt-2" />
                                            </div>

                                            <div class="w-full">
                                                <x-jet-label for="incidentArea" value="{{ __('Sub-region where incident occurred') }}" />
                                                <select id="incidentArea" name="incidentArea" wire:model.defer="incidentArea" autocomplete="incidentArea" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                    <option value="null">Sub-Region</option>
                                                    <option value="I-1">I-1 Barima</option>
                                                    <option value="I-2">I-2 Waini</option>
                                                    <option value="II-1">II-1 Moruka/Pomeroon</option>
                                                    <option value="II-2">II-2 Somerset And Berks Essequibo I./L.B.E.River</option>
                                                    <option value="III-1">III-1 Essequibo Islands</option>
                                                    <option value="III-2">III-2 Bonasika/Boerasirie</option>
                                                    <option value="III-3">III-3 Lower West Demerara</option>
                                                    <option value="IV-1">IV-1 Moblissa/La Reconnai</option>
                                                    <option value="IV-2">IV-2 Buxton/Mahaica</option>
                                                    <option value="V-1 ">V-1 Mahaica/Mahaicony</option>
                                                    <option value="V-2">V-2 Mahaicony/Berbice</option>
                                                    <option value="VI-1">VI-1 East Berbice/W.Canje</option>
                                                    <option value="VI-2">VI-2 East Canje/E.C.Berb</option>
                                                    <option value="VI-3">VI-3 Black Bush Polder</option>
                                                    <option value="VI-4">VI-4 Lower Corentyne Rive</option>
                                                    <option value="VI-5">VI-5 Left Bank Upper Canj</option>
                                                    <option value="VI-6">VI-6 Upper Canje/Corentyn</option>
                                                    <option value="VI-7">VI-7 Upper Corentyne</option>
                                                    <option value="VII-1">VII-1 Cuyuni</option>
                                                    <option value="VII-2">VII-2 Mazaruni/L.B.E.Rive</option>
                                                    <option value="VIII-1">VIII-1 Ireng/Upper Potaro</option>
                                                    <option value="VIII-2">VIII-2 Lower Potaro/Ladsm</option>
                                                    <option value="IX-1">IX-1 Rupununi West</option>
                                                    <option value="IX-2">IX-2 Rewa(Illiwa)/U.E</option>
                                                    <option value="X-1">X-1 Right Bank Essequibo</option>
                                                    <option value="X-2">X-2 Torani/Bulletwood</option>
                                                </select>
                                                <x-jet-input-error for="incidentArea" class="mt-2" />
                                            </div>

                                            <div class="w-full">
                                                <x-jet-label for="incidentCamp" value="{{ __('Other/specific location name (town/camp/site etc)') }}" />
                                                <div class="flex items-center">
                                                    <x-jet-input id="incidentCamp" name="incidentCamp" value="Widowed" type="radio" class="block" autocomplete="incidentCamp" />
                                                    <x-jet-label class="ml-3" for="incidentCamp" value="{{ __('Other (specify)') }}" />
                                                    <x-jet-input id="incidentCamp" type="text" class="mt-1 block w-full" wire:model.defer="incidentCamp" autocomplete="incidentCamp" />
                                                </div>
                                                <x-jet-input-error for="incidentCamp" class="mt-2" />
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div class="sm:flex block justify-between gap-4">

                                            <div x-data="{ nonGbvType: false }" class="mt-4">
                                                <x-jet-label for="gbvType" value="{{ __('Type of Incident Violence*: (Please refer to the GBVIMS GBV Classification Tool and select only ONE)') }}" />
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input @click="nonGbvType = false" id="rape" name="gbvType" value="Rape" type="radio" class="block" wire:model.defer="gbvType" autocomplete="gbvType" />
                                                    <x-jet-label class="ml-3" for="rape" value="{{ __('Rape (includes gang rape, marital rape)') }}" />
                                                </div>
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input @click="nonGbvType = false" id="sexualAssault" name="gbvType" value="Sexual Assault" type="radio" class="block" wire:model.defer="gbvType" autocomplete="gbvType" />
                                                    <x-jet-label class="ml-3" for="sexualAssault" value="{{ __('Sexual Assault (includes attempted rape and all sexual violence/abuse without penetration, and female genital mutilation/cutting)') }}" />
                                                </div>
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input @click="nonGbvType = false" id="physicalAssault" name="gbvType" value="Physical Assault" type="radio" class="block" wire:model.defer="gbvType" autocomplete="gbvType" />
                                                    <x-jet-label class="ml-3" for="physicalAssault" value="{{ __('Physical Assault (includes hitting, slapping, kicking, shoving, etc. that are not sexual in nature)') }}" />
                                                </div>
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input @click="nonGbvType = false" id="forcedMarriage" name="gbvType" value="Forced Marriage" type="radio" class="block" wire:model.defer="gbvType" autocomplete="gbvType" />
                                                    <x-jet-label class="ml-3" for="forcedMarriage" value="{{ __('Forced Marriage (includes early marriage)') }}" />
                                                </div>
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input @click="nonGbvType = false" id="denialOfResources" name="gbvType" value="Denial of Resources" type="radio" class="block" wire:model.defer="gbvType" autocomplete="gbvType" />
                                                    <x-jet-label class="ml-3" for="denialOfResources" value="{{ __('Denial of Resources, Opportunities or Services') }}" />
                                                </div>
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input @click="nonGbvType = false" id="psychologicalEmotionalAbuse" name="gbvType" value="Psychological / Emotional Abuse" type="radio" class="block" wire:model.defer="gbvType" autocomplete="gbvType" />
                                                    <x-jet-label class="ml-3" for="psychologicalEmotionalAbuse" value="{{ __('Psychological / Emotional Abuse') }}" />
                                                </div>
                                                <div class="mt-2 flex items-center">
                                                    <x-jet-input @click="nonGbvType = true" id="nonGbvType" name="gbvType" value="Non-GBV (specify)" type="radio" class="block" autocomplete="gbvType" />
                                                    <x-jet-label class="ml-3" for="nonGbvType" value="{{ __('Non-GBV (specify)') }}" />
                                                    <x-jet-input x-show="nonGbvType" id="nonGbvType" type="text" class="block w-full" wire:model.defer="gbvType" autocomplete="gbvType" />
                                                </div>
                                                <x-jet-input-error for="gbvType" class="mt-2" />
                                            </div>
                                            <div>
                                                <x-jet-label for="gbvType" value="{{ __('1. Did the reported incident involve penetration?') }}" />
                                                <div class="items-center">
                                                    <x-jet-label class="ml-3" for="rape" value="{{ __('If yes, classify the incident as “Rape”.') }}" />
                                                    <x-jet-label class="ml-3" for="rape" value="{{ __('If no, proceed to the next incident type on the list.') }}" />
                                                </div>
                                                <x-jet-label for="gbvType" value="{{ __('2. Did the reported incident involve unwanted sexual contact?') }}" />
                                                <div class="items-center">
                                                    <x-jet-label class="ml-3" for="rape" value="{{ __('If yes, classify the incident as “Sexual Assault”.') }}" />
                                                    <x-jet-label class="ml-3" for="rape" value="{{ __('If no, proceed to the next incident type on the list.') }}" />
                                                </div>
                                                <x-jet-label for="gbvType" value="{{ __('3. Did the reported incident involve physical assault?') }}" />
                                                <div class="items-center">
                                                    <x-jet-label class="ml-3" for="rape" value="{{ __('If yes, classify the incident as “Physical Assault”.') }}" />
                                                    <x-jet-label class="ml-3" for="rape" value="{{ __('If no, proceed to the next incident type on the list.') }}" />
                                                </div>
                                                <x-jet-label for="gbvType" value="{{ __('4. Was the incident an act of forced marriage?') }}" />
                                                <div class="items-center">
                                                    <x-jet-label class="ml-3" for="rape" value="{{ __('If yes, classify the incident as “Forced Marriage”.') }}" />
                                                    <x-jet-label class="ml-3" for="rape" value="{{ __('If no, proceed to the next incident type on the list.') }}" />
                                                </div>
                                                <x-jet-label for="gbvType" value="{{ __('5. Did the reported incident involve the denial of resources, opportunities or services?') }}" />
                                                <div class="items-center">
                                                    <x-jet-label class="ml-3" for="rape" value="{{ __('If yes, classify the incident as “Denial of Resources, Opportunities or Services”.') }}" />
                                                    <x-jet-label class="ml-3" for="rape" value="{{ __('If no, proceed to the next incident type on the list.') }}" />
                                                </div>
                                                <x-jet-label for="gbvType" value="{{ __('6. Did the reported incident involve psychological/emotional abuse?') }}" />
                                                <div class="items-center">
                                                    <x-jet-label class="ml-3" for="rape" value="{{ __('If yes, classify the incident as “Psychological / Emotional Abuse”.') }}" />
                                                    <x-jet-label class="ml-3" for="rape" value="{{ __('If no, proceed to the next incident type on the list.') }}" />
                                                </div>
                                                <x-jet-label for="gbvType" value="{{ __('7. Is the reported incident a case of GBV?') }}" />
                                                <div class="items-center">
                                                    <x-jet-label class="ml-3" for="rape" value="{{ __('If yes, Start over at number 1 and try again to reclassify the incident (If you have tried to classify the incident multiple times, ask your supervisor to help you classify this incident).') }}" />
                                                    <x-jet-label class="ml-3" for="rape" value="{{ __('If no, classify the incident as “Non-GBV”') }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div class="sm:flex block justify-between gap-4">
                                            <div class="w-full">
                                                <x-jet-label for="harmfulTraditionalPractice" value="{{ __('Was this incident a Harmful Traditional Practice') }}" />
                                                <div class="flex items-center gap-6">
                                                    <div class="flex items-center">
                                                        <x-jet-input id="yesHarmfulTraditionalPractice" name="harmfulTraditionalPractice" value="Yes" type="radio" class="block" wire:model.defer="harmfulTraditionalPractice" autocomplete="harmfulTraditionalPractice" />
                                                        <x-jet-label class="ml-3" for="yesHarmfulTraditionalPractice" value="{{ __('Yes') }}" />
                                                    </div>
                                                    <div class="flex items-center">
                                                        <x-jet-input id="noHarmfulTraditionalPractice" name="harmfulTraditionalPractice" value="No" type="radio" class="block" wire:model.defer="harmfulTraditionalPractice" autocomplete="harmfulTraditionalPractice" />
                                                        <x-jet-label class="ml-3" for="noHarmfulTraditionalPractice" value="{{ __('No') }}" />
                                                    </div>
                                                </div>
                                                <x-jet-input-error for="harmfulTraditionalPractice" class="mt-2" />
                                            </div>
                                            <div class="w-full">
                                                <x-jet-label for="moneyGoodsBenefitsAndOrServicesExchanged" value="{{ __('Were money, goods, benefits, and / or services exchanged in relation to this incident') }}" />
                                                <div class="flex items-center gap-6">
                                                    <div class="flex items-center">
                                                        <x-jet-input id="yesMoneyGoodsBenefitsAndOrServicesExchanged" name="moneyGoodsBenefitsAndOrServicesExchanged" value="Yes" type="radio" class="block" wire:model.defer="moneyGoodsBenefitsAndOrServicesExchanged" autocomplete="moneyGoodsBenefitsAndOrServicesExchanged" />
                                                        <x-jet-label class="ml-3" for="yesMoneyGoodsBenefitsAndOrServicesExchanged" value="{{ __('Yes') }}" />
                                                    </div>
                                                    <div class="flex items-center">
                                                        <x-jet-input id="noMoneyGoodsBenefitsAndOrServicesExchanged" name="moneyGoodsBenefitsAndOrServicesExchanged" value="No" type="radio" class="block" wire:model.defer="moneyGoodsBenefitsAndOrServicesExchanged" autocomplete="moneyGoodsBenefitsAndOrServicesExchanged" />
                                                        <x-jet-label class="ml-3" for="noMoneyGoodsBenefitsAndOrServicesExchanged" value="{{ __('No') }}" />
                                                    </div>
                                                </div>
                                                <x-jet-input-error for="moneyGoodsBenefitsAndOrServicesExchanged" class="mt-2" />
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div>
                                            <x-jet-label for="typeOfAbduction" value="{{ __('Type of abduction at time of the incident') }}" />
                                            <div class="mt-2 flex items-center gap-6">
                                                <div class="flex items-center">
                                                    <x-jet-input id="none" name="typeOfAbduction" value="None" type="radio" class="block" wire:model.defer="typeOfAbduction" autocomplete="typeOfAbduction" />
                                                    <x-jet-label class="ml-3" for="none" value="{{ __('None') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="forcedConscription" name="typeOfAbduction" value="Forced Conscription" type="radio" class="block" wire:model.defer="typeOfAbduction" autocomplete="typeOfAbduction" />
                                                    <x-jet-label class="ml-3" for="forcedConscription" value="{{ __('Forced Conscription') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="trafficked" name="typeOfAbduction" value="Trafficked" type="radio" class="block" wire:model.defer="typeOfAbduction" autocomplete="typeOfAbduction" />
                                                    <x-jet-label class="ml-3" for="trafficked" value="{{ __('Trafficked') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="otherTypeOfAbduction" name="typeOfAbduction" value="Other Abduction / Kidnapping" type="radio" class="block" wire:model.defer="typeOfAbduction" autocomplete="typeOfAbduction" />
                                                    <x-jet-label class="ml-3" for="otherTypeOfAbduction" value="{{ __('Other Abduction / Kidnapping') }}" />
                                                </div>
                                            </div>
                                            <x-jet-input-error for="typeOfAbduction" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div>
                                            <x-jet-label for="previouslyReportedThisIncident" value="{{ __('Has the client reported this incident anywhere else? (If yes, select the type of service provider and write the name of the provider where the client reported); (Select all that apply).') }}" />
                                            <div class="mt-2 flex items-center">
                                                <x-jet-input id="noPreviouslyReportedThisIncident" name="previouslyReportedThisIncident" value="No" type="checkbox" class="block" wire:model.defer="previouslyReportedThisIncident" autocomplete="previouslyReportedThisIncident" />
                                                <x-jet-label class="ml-3" for="noPreviouslyReportedThisIncident" value="{{ __('No') }}" />
                                            </div>
                                            <div x-data="{ healthMedicalServices: false }" class="mt-2 flex items-center">
                                                <x-jet-input @click="healthMedicalServices = !healthMedicalServices" id="healthMedicalServices" name="previouslyReportedThisIncident" value="Health/Medical Services" type="checkbox" class="block" wire:model.defer="previouslyReportedThisIncident" autocomplete="previouslyReportedThisIncident" />
                                                <x-jet-label class="ml-3" for="healthMedicalServices" value="{{ __('Health/Medical Services') }}" />
                                                <x-jet-input x-show="healthMedicalServices" id="healthMedicalServices" type="text" class="block w-full" wire:model.defer="typeNameHealthMedicalServices" autocomplete="healthMedicalServices" />
                                            </div>
                                            <div x-data="{ psychosocialCounselingServices: false }" class="mt-2 flex items-center">
                                                <x-jet-input @click="psychosocialCounselingServices = !psychosocialCounselingServices" id="psychosocialCounselingServices" name="previouslyReportedThisIncident" value="Psychosocial/Counseling Services" type="checkbox" class="block" wire:model.defer="previouslyReportedThisIncident" autocomplete="previouslyReportedThisIncident" />
                                                <x-jet-label class="ml-3" for="psychosocialCounselingServices" value="{{ __('Psychosocial/Counseling Services') }}" />
                                                <x-jet-input x-show="psychosocialCounselingServices" id="psychosocialCounselingServices" type="text" class="block w-full" wire:model.defer="typeNamePsychosocialCounselingServices" autocomplete="psychosocialCounselingServices" />
                                            </div>
                                            <div x-data="{ policeOtherSecurityActor: false }" class="mt-2 flex items-center">
                                                <x-jet-input @click="policeOtherSecurityActor = !policeOtherSecurityActor" id="policeOtherSecurityActor" name="previouslyReportedThisIncident" value="Police/Other Security Actor" type="checkbox" class="block" wire:model.defer="previouslyReportedThisIncident" autocomplete="previouslyReportedThisIncident" />
                                                <x-jet-label class="ml-3" for="policeOtherSecurityActor" value="{{ __('Police/Other Security Actor') }}" />
                                                <x-jet-input x-show="policeOtherSecurityActor" id="policeOtherSecurityActor" type="text" class="block w-full" wire:model.defer="typeNamePoliceOtherSecurityActor" autocomplete="policeOtherSecurityActor" />
                                            </div>
                                            <div x-data="{ legalAssistanceServices: false }" class="mt-2 flex items-center">
                                                <x-jet-input @click="legalAssistanceServices = !legalAssistanceServices" id="legalAssistanceServices" name="previouslyReportedThisIncident" value="Legal Assistance Services" type="checkbox" class="block" wire:model.defer="previouslyReportedThisIncident" autocomplete="previouslyReportedThisIncident" />
                                                <x-jet-label class="ml-3" for="legalAssistanceServices" value="{{ __('Legal Assistance Services') }}" />
                                                <x-jet-input x-show="legalAssistanceServices" id="legalAssistanceServices" type="text" class="block w-full" wire:model.defer="typeNameLegalAssistanceServices" autocomplete="legalAssistanceServices" />
                                            </div>
                                            <div x-data="{ livelihoodsProgram: false }" class="mt-2 flex items-center">
                                                <x-jet-input @click="livelihoodsProgram = !livelihoodsProgram" id="livelihoodsProgram" name="previouslyReportedThisIncident" value="Livelihoods Program" type="checkbox" class="block" wire:model.defer="previouslyReportedThisIncident" autocomplete="previouslyReportedThisIncident" />
                                                <x-jet-label class="ml-3" for="livelihoodsProgram" value="{{ __('Livelihoods Program') }}" />
                                                <x-jet-input x-show="livelihoodsProgram" id="livelihoodsProgram" type="text" class="block w-full" wire:model.defer="typeNameLivelihoodsProgram" autocomplete="livelihoodsProgram" />
                                            </div>
                                            <div x-data="{ safeHouseShelter: false }" class="mt-2 flex items-center">
                                                <x-jet-input @click="safeHouseShelter = !safeHouseShelter" id="safeHouseShelter" name="previouslyReportedThisIncident" value="Safe House/Shelter" type="checkbox" class="block" wire:model.defer="previouslyReportedThisIncident" autocomplete="previouslyReportedThisIncident" />
                                                <x-jet-label class="ml-3" for="safeHouseShelter" value="{{ __('Safe House/Shelter') }}" />
                                                <x-jet-input x-show="safeHouseShelter" id="safeHouseShelter" type="text" class="block w-full" wire:model.defer="typeNameSafeHouseShelter" autocomplete="safeHouseShelter" />
                                            </div>
                                            <div x-data="{ otherPreviouslyReportedThisIncident: false }" class="mt-2 flex items-center">
                                                <x-jet-input @click="otherPreviouslyReportedThisIncident = !otherPreviouslyReportedThisIncident" id="otherPreviouslyReportedThisIncident" name="previouslyReportedThisIncident" value="Other (specify)" type="checkbox" class="block" wire:model.defer="previouslyReportedThisIncident" autocomplete="previouslyReportedThisIncident" />
                                                <x-jet-label class="ml-3" for="otherPreviouslyReportedThisIncident" value="{{ __('Other (specify)') }}" />
                                                <x-jet-input x-show="otherPreviouslyReportedThisIncident" id="otherPreviouslyReportedThisIncident" type="text" class="block w-full" wire:model.defer="typeNameOtherPreviouslyReportedThisIncident" autocomplete="otherPreviouslyReportedThisIncident" />
                                            </div>
                                            <x-jet-input-error for="previouslyReportedThisIncident" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div x-data=" { previousGbvIncidents: false }">
                                            <div class="mt-4 flex items-center gap-6">
                                                <x-jet-label for="previousGbvIncidents" value="{{ __('Has the client had any previous incidents of GBV perpetrated against them?') }}" />
                                                <div class="flex items-center gap-6">
                                                    <div class="flex items-center">
                                                        <x-jet-input @click="previousGbvIncidents = true" id="yesPreviousGbvIncidents" name="previousGbvIncidents" value="Yes" type="radio" class="block" autocomplete="previousGbvIncidents" />
                                                        <x-jet-label class="ml-3" for="yesPreviousGbvIncidents" value="{{ __('Yes') }}" />
                                                    </div>
                                                    <div class="flex items-center">
                                                        <x-jet-input @click="previousGbvIncidents = false" id="noPreviousGbvIncidents" name="previousGbvIncidents" value="No" type="radio" class="block" wire:model.defer="previousGbvIncidents" autocomplete="previousGbvIncidents" />
                                                        <x-jet-label class="ml-3" for="noPreviousGbvIncidents" value="{{ __('No') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div x-show="previousGbvIncidents" class="mt-4">
                                                <div class="mt-4">
                                                    <x-jet-label for="yesPreviousGbvIncidents" value="{{ __('If yes, include a brief description') }}" />
                                                    <textarea wire:model.defer="previousGbvIncidents" id="yesPreviousGbvIncidents" name="yesPreviousGbvIncidents" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                                                    <x-jet-input-error for="yesPreviousGbvIncidents" class="mt-2" />
                                                </div>
                                            </div>
                                            <x-jet-input-error for="noPreviousGbvIncidents" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div class="flex items-center gap-6">
                                            <x-jet-label for="numberOfAllegedPrimaryPerpetrators" value="{{ __('Number of alleged perpetrator(s)') }}" />
                                            <div class="flex items-center gap-6">
                                                <div class="flex items-center">
                                                    <x-jet-input id="one" name="numberOfAllegedPrimaryPerpetrators" value="1" type="radio" class="block" wire:model.defer="numberOfAllegedPrimaryPerpetrators" autocomplete="numberOfAllegedPrimaryPerpetrators" />
                                                    <x-jet-label class="ml-3" for="one" value="{{ __('1') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="two" name="numberOfAllegedPrimaryPerpetrators" value="2" type="radio" class="block" wire:model.defer="numberOfAllegedPrimaryPerpetrators" autocomplete="numberOfAllegedPrimaryPerpetrators" />
                                                    <x-jet-label class="ml-3" for="two" value="{{ __('2') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="three" name="numberOfAllegedPrimaryPerpetrators" value="3" type="radio" class="block" wire:model.defer="numberOfAllegedPrimaryPerpetrators" autocomplete="numberOfAllegedPrimaryPerpetrators" />
                                                    <x-jet-label class="ml-3" for="three" value="{{ __('3') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="moreThanThree" name="numberOfAllegedPrimaryPerpetrators" value="More than 3" type="radio" class="block" wire:model.defer="numberOfAllegedPrimaryPerpetrators" autocomplete="numberOfAllegedPrimaryPerpetrators" />
                                                    <x-jet-label class="ml-3" for="moreThanThree" value="{{ __('More than 3') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="unknown" name="numberOfAllegedPrimaryPerpetrators" value="Unknown" type="radio" class="block" wire:model.defer="numberOfAllegedPrimaryPerpetrators" autocomplete="numberOfAllegedPrimaryPerpetrators" />
                                                    <x-jet-label class="ml-3" for="unknown" value="{{ __('Unknown') }}" />
                                                </div>
                                            </div>
                                            <x-jet-input-error for="numberOfAllegedPrimaryPerpetrators" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div class="flex items-center gap-6">
                                            <x-jet-label for="allegedPerpetratorSex" value="{{ __('Sex of alleged perpetrator(s)') }}" />
                                            <div class="flex items-center gap-6">
                                                <div class="flex items-center">
                                                    <x-jet-input id="female" name="allegedPerpetratorSex" value="Female" type="radio" class="block" wire:model.defer="allegedPerpetratorSex" autocomplete="allegedPerpetratorSex" />
                                                    <x-jet-label class="ml-3" for="female" value="{{ __('Female') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="male" name="allegedPerpetratorSex" value="Male" type="radio" class="block" wire:model.defer="allegedPerpetratorSex" autocomplete="allegedPerpetratorSex" />
                                                    <x-jet-label class="ml-3" for="male" value="{{ __('Male') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="bothFemaleAndMalePerpetrators" name="allegedPerpetratorSex" value="Both female and male perpetrators" type="radio" class="block" wire:model.defer="allegedPerpetratorSex" autocomplete="allegedPerpetratorSex" />
                                                    <x-jet-label class="ml-3" for="bothFemaleAndMalePerpetrators" value="{{ __('Both female and male perpetrators') }}" />
                                                </div>
                                            </div>
                                            <x-jet-input-error for="allegedPerpetratorSex" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div class="sm:flex block justify-between gap-4">
                                            <div class="w-full">
                                                <x-jet-label for="nationalityOfAllegedPerpetrator" value="{{ __('Nationality of alleged perpetrator') }}" />
                                                <x-jet-input id="nationalityOfAllegedPerpetrator" type="text" class="mt-1 block w-full" wire:model.defer="nationalityOfAllegedPerpetrator" autocomplete="nationalityOfAllegedPerpetrator" />
                                                <x-jet-input-error for="nationalityOfAllegedPerpetrator" class="mt-2" />
                                            </div>

                                            <div class="w-full">
                                                <x-jet-label for="clanEthnicityOfAllegedPerpetrator" value="{{ __('Clan or ethnicity of alleged perpetrator') }}" />
                                                <x-jet-input id="clanEthnicityOfAllegedPerpetrator" type="text" class="mt-1 block w-full" wire:model.defer="clanEthnicityOfAllegedPerpetrator" autocomplete="clanEthnicityOfAllegedPerpetrator" />
                                                <x-jet-input-error for="clanEthnicityOfAllegedPerpetrator" class="mt-2" />
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div>
                                            <x-jet-label for="allegedPerpetratorAgeGroup" value="{{ __('Age group of alleged perpetrator (s)* (if known or can be estimated)') }}" />
                                            <div class="mt-2 flex items-center gap-6">
                                                <div class="flex items-center">
                                                    <x-jet-input id="0to11" name="allegedPerpetratorAgeGroup" value="0-11" type="radio" class="block" wire:model.defer="allegedPerpetratorAgeGroup" autocomplete="allegedPerpetratorAgeGroup" />
                                                    <x-jet-label class="ml-3" for="0to11" value="{{ __('0-11') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="12to17" name="allegedPerpetratorAgeGroup" value="12-17" type="radio" class="block" wire:model.defer="allegedPerpetratorAgeGroup" autocomplete="allegedPerpetratorAgeGroup" />
                                                    <x-jet-label class="ml-3" for="12to17" value="{{ __('12-17') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="18to25" name="allegedPerpetratorAgeGroup" value="18-25" type="radio" class="block" wire:model.defer="allegedPerpetratorAgeGroup" autocomplete="allegedPerpetratorAgeGroup" />
                                                    <x-jet-label class="ml-3" for="18to25" value="{{ __('18-25') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="26to40" name="allegedPerpetratorAgeGroup" value="26-40" type="radio" class="block" wire:model.defer="allegedPerpetratorAgeGroup" autocomplete="allegedPerpetratorAgeGroup" />
                                                    <x-jet-label class="ml-3" for="26to40" value="{{ __('26-40') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="41to60" name="allegedPerpetratorAgeGroup" value="41-60" type="radio" class="block" wire:model.defer="allegedPerpetratorAgeGroup" autocomplete="allegedPerpetratorAgeGroup" />
                                                    <x-jet-label class="ml-3" for="41to60" value="{{ __('41-60') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="61plus" name="allegedPerpetratorAgeGroup" value="61+" type="radio" class="block" wire:model.defer="allegedPerpetratorAgeGroup" autocomplete="allegedPerpetratorAgeGroup" />
                                                    <x-jet-label class="ml-3" for="61plus" value="{{ __('61+') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="unknownAllegedPerpetratorAgeGroup" name="allegedPerpetratorAgeGroup" value="Unknown" type="radio" class="block" wire:model.defer="allegedPerpetratorAgeGroup" autocomplete="allegedPerpetratorAgeGroup" />
                                                    <x-jet-label class="ml-3" for="unknownAllegedPerpetratorAgeGroup" value="{{ __('Unknown') }}" />
                                                </div>
                                            </div>
                                            <x-jet-input-error for="allegedPerpetratorAgeGroup" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div>
                                            <x-jet-label for="allegedPerpetratorRelationshipWithSurvivor" value="{{ __('Alleged perpetrator relationship with survivor*: (Select the first ONE that applies)') }}" />
                                            <div class="mt-2 flex items-center">
                                                <x-jet-input id="intimateFormerPartner" name="allegedPerpetratorRelationshipWithSurvivor" value="Intimate partner / Former partner" type="radio" class="block" wire:model.defer="allegedPerpetratorRelationshipWithSurvivor" autocomplete="allegedPerpetratorRelationshipWithSurvivor" />
                                                <x-jet-label class="ml-3" for="intimateFormerPartner" value="{{ __('Intimate partner / Former partner') }}" />
                                            </div>
                                            <div class="mt-2 flex items-center">
                                                <x-jet-input id="primaryCaregiver" name="allegedPerpetratorRelationshipWithSurvivor" value="Primary caregiver" type="radio" class="block" wire:model.defer="allegedPerpetratorRelationshipWithSurvivor" autocomplete="allegedPerpetratorRelationshipWithSurvivor" />
                                                <x-jet-label class="ml-3" for="primaryCaregiver" value="{{ __('Primary caregiver') }}" />
                                            </div>
                                            <div class="mt-2 flex items-center">
                                                <x-jet-input id="familyOtherThanSpouseCaregiver" name="allegedPerpetratorRelationshipWithSurvivor" value="Family other than spouse or caregiver" type="radio" class="block" wire:model.defer="allegedPerpetratorRelationshipWithSurvivor" autocomplete="allegedPerpetratorRelationshipWithSurvivor" />
                                                <x-jet-label class="ml-3" for="familyOtherThanSpouseCaregiver" value="{{ __('Family other than spouse or caregiver') }}" />
                                            </div>
                                            <div class="mt-2 flex items-center">
                                                <x-jet-input id="supervisorEmployer" name="allegedPerpetratorRelationshipWithSurvivor" value="Supervisor / Employer" type="radio" class="block" wire:model.defer="allegedPerpetratorRelationshipWithSurvivor" autocomplete="allegedPerpetratorRelationshipWithSurvivor" />
                                                <x-jet-label class="ml-3" for="supervisorEmployer" value="{{ __('Supervisor / Employer') }}" />
                                            </div>
                                            <div class="mt-2 flex items-center">
                                                <x-jet-input id="schoolmate" name="allegedPerpetratorRelationshipWithSurvivor" value="Schoolmate" type="radio" class="block" wire:model.defer="allegedPerpetratorRelationshipWithSurvivor" autocomplete="allegedPerpetratorRelationshipWithSurvivor" />
                                                <x-jet-label class="ml-3" for="schoolmate" value="{{ __('Schoolmate') }}" />
                                            </div>
                                            <div class="mt-2 flex items-center">
                                                <x-jet-input id="teacherSchoolOfficial" name="allegedPerpetratorRelationshipWithSurvivor" value="Teacher / School official" type="radio" class="block" wire:model.defer="allegedPerpetratorRelationshipWithSurvivor" autocomplete="allegedPerpetratorRelationshipWithSurvivor" />
                                                <x-jet-label class="ml-3" for="teacherSchoolOfficial" value="{{ __('Teacher / School official') }}" />
                                            </div>
                                            <div class="mt-2 flex items-center">
                                                <x-jet-input id="serviceProvider" name="allegedPerpetratorRelationshipWithSurvivor" value="Service Provider" type="radio" class="block" wire:model.defer="allegedPerpetratorRelationshipWithSurvivor" autocomplete="allegedPerpetratorRelationshipWithSurvivor" />
                                                <x-jet-label class="ml-3" for="serviceProvider" value="{{ __('Service Provider') }}" />
                                            </div>
                                            <div class="mt-2 flex items-center">
                                                <x-jet-input id="cotenantHousemate" name="allegedPerpetratorRelationshipWithSurvivor" value="Cotenant / Housemate" type="radio" class="block" wire:model.defer="allegedPerpetratorRelationshipWithSurvivor" autocomplete="allegedPerpetratorRelationshipWithSurvivor" />
                                                <x-jet-label class="ml-3" for="cotenantHousemate" value="{{ __('Cotenant / Housemate') }}" />
                                            </div>
                                            <div class="mt-2 flex items-center">
                                                <x-jet-input id="familyFriendNeighbor" name="allegedPerpetratorRelationshipWithSurvivor" value="Family Friend / Neighbor" type="radio" class="block" wire:model.defer="allegedPerpetratorRelationshipWithSurvivor" autocomplete="allegedPerpetratorRelationshipWithSurvivor" />
                                                <x-jet-label class="ml-3" for="familyFriendNeighbor" value="{{ __('Family Friend / Neighbor') }}" />
                                            </div>
                                            <div class="mt-2 flex items-center">
                                                <x-jet-input id="otherRefugeeIDPReturnee" name="allegedPerpetratorRelationshipWithSurvivor" value="Other refugee / IDP / Returnee" type="radio" class="block" wire:model.defer="allegedPerpetratorRelationshipWithSurvivor" autocomplete="allegedPerpetratorRelationshipWithSurvivor" />
                                                <x-jet-label class="ml-3" for="otherRefugeeIDPReturnee" value="{{ __('Other refugee / IDP / Returnee') }}" />
                                            </div>
                                            <div class="mt-2 flex items-center">
                                                <x-jet-input id="otherResidentCommunityMember" name="allegedPerpetratorRelationshipWithSurvivor" value="Other resident community member" type="radio" class="block" wire:model.defer="allegedPerpetratorRelationshipWithSurvivor" autocomplete="allegedPerpetratorRelationshipWithSurvivor" />
                                                <x-jet-label class="ml-3" for="otherResidentCommunityMember" value="{{ __('Other resident community member') }}" />
                                            </div>
                                            <div class="mt-2 flex items-center">
                                                <x-jet-input id="otherAllegedPerpetratorRelationshipWithSurvivor" name="allegedPerpetratorRelationshipWithSurvivor" value="Other" type="radio" class="block" wire:model.defer="allegedPerpetratorRelationshipWithSurvivor" autocomplete="allegedPerpetratorRelationshipWithSurvivor" />
                                                <x-jet-label class="ml-3" for="otherAllegedPerpetratorRelationshipWithSurvivor" value="{{ __('Other') }}" />
                                            </div>
                                            <div class="mt-2 flex items-center">
                                                <x-jet-input id="noRelation" name="allegedPerpetratorRelationshipWithSurvivor" value="No relation" type="radio" class="block" wire:model.defer="allegedPerpetratorRelationshipWithSurvivor" autocomplete="allegedPerpetratorRelationshipWithSurvivor" />
                                                <x-jet-label class="ml-3" for="noRelation" value="{{ __('No relation') }}" />
                                            </div>
                                            <div class="mt-2 flex items-center">
                                                <x-jet-input id="unknownAllegedPerpetratorRelationshipWithSurvivor" name="allegedPerpetratorRelationshipWithSurvivor" value="Unknown" type="radio" class="block" wire:model.defer="allegedPerpetratorRelationshipWithSurvivor" autocomplete="allegedPerpetratorRelationshipWithSurvivor" />
                                                <x-jet-label class="ml-3" for="unknownAllegedPerpetratorRelationshipWithSurvivor" value="{{ __('Unknown') }}" />
                                            </div>
                                            <x-jet-input-error for="allegedPerpetratorRelationshipWithSurvivor" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div>
                                            <x-jet-label for="mainOccupationOfAllegedPerpetrator" value="{{ __('Main occupation of alleged perpetrator (if known)*: (Customize occupation options by adding new, or removing tick boxes according to your location)') }}" />
                                            <div x-data="{ otherMainOccupationOfAllegedPerpetrator: false }" class="mt-2 flex items-center gap-6">
                                                <div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="farmer" name="mainOccupationOfAllegedPerpetrator" value="Farmer" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="farmer" value="{{ __('Farmer') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="student" name="mainOccupationOfAllegedPerpetrator" value="Student" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="student" value="{{ __('Student') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="civilServant" name="mainOccupationOfAllegedPerpetrator" value="Civil Servant" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="civilServant" value="{{ __('Civil Servant') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="police" name="mainOccupationOfAllegedPerpetrator" value="Police" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="police" value="{{ __('Police') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="stateMilitary" name="mainOccupationOfAllegedPerpetrator" value="State Military" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="stateMilitary" value="{{ __('State Military') }}" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="traderBusinessOwner" name="mainOccupationOfAllegedPerpetrator" value="Trader / Business Owner" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="traderBusinessOwner" value="{{ __('Trader / Business Owner') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="nonStateArmedActorRebelMilitia" name="mainOccupationOfAllegedPerpetrator" value="Non-State Armed Actor / Rebel / Militia" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="nonStateArmedActorRebelMilitia" value="{{ __('Non-State Armed Actor / Rebel / Militia') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="securityOfficial" name="mainOccupationOfAllegedPerpetrator" value="Security Official" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="securityOfficial" value="{{ __('Security Official') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="campCommunityLeader" name="mainOccupationOfAllegedPerpetrator" value="Camp or Community Leader" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="campCommunityLeader" value="{{ __('Camp or Community Leader') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="religiousLeader" name="mainOccupationOfAllegedPerpetrator" value="Religious Leader" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="religiousLeader" value="{{ __('Religious Leader') }}" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="teacher" name="mainOccupationOfAllegedPerpetrator" value="Teacher" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="teacher" value="{{ __('Teacher') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="uNStaff" name="mainOccupationOfAllegedPerpetrator" value="UN Staff" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="uNStaff" value="{{ __('UN Staff') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="nGOStaff" name="mainOccupationOfAllegedPerpetrator" value="NGO Staff" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="nGOStaff" value="{{ __('NGO Staff') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="cBOStaff" name="mainOccupationOfAllegedPerpetrator" value="CBO Staff" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="cBOStaff" value="{{ __('CBO Staff') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="communityVolunteer" name="mainOccupationOfAllegedPerpetrator" value="Community Volunteer" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="communityVolunteer" value="{{ __('Community Volunteer') }}" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="healthWorker" name="mainOccupationOfAllegedPerpetrator" value="Health Worker" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="healthWorker" value="{{ __('Health Worker') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="unemployed" name="mainOccupationOfAllegedPerpetrator" value="Unemployed" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="unemployed" value="{{ __('Unemployed') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = false" id="unknownMainOccupationOfAllegedPerpetrator" name="mainOccupationOfAllegedPerpetrator" value="Unknown" type="radio" class="block" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="unknownMainOccupationOfAllegedPerpetrator" value="{{ __('Unknown') }}" />
                                                    </div>
                                                    <div class=" flex items-center mt-2">
                                                        <x-jet-input @click="otherMainOccupationOfAllegedPerpetrator = true" id="otherMainOccupationOfAllegedPerpetrator" name="mainOccupationOfAllegedPerpetrator" type="radio" class="block" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                        <x-jet-label class="ml-3" for="otherMainOccupationOfAllegedPerpetrator" value="{{ __('Other (specify)') }}" />
                                                        <x-jet-input x-show="otherMainOccupationOfAllegedPerpetrator" id="mainOccupationOfAllegedPerpetrator" type="text" class="block w-full" wire:model.defer="mainOccupationOfAllegedPerpetrator" autocomplete="mainOccupationOfAllegedPerpetrator" />
                                                    </div>
                                                </div>
                                            </div>
                                            <x-jet-input-error for="mainOccupationOfAllegedPerpetrator" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div>
                                            <x-jet-label for="referredToYouFrom" value="{{ __('Who referred the client to you?') }}" />
                                            <div x-data="{ otherReferredToYouFrom: false }" class="mt-2 flex items-center gap-6">
                                                <div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherReferredToYouFrom = false" id="healthMedicalServicesReferredToYouFrom" name="referredToYouFrom" value="Health/Medical Services" type="radio" class="block" wire:model.defer="referredToYouFrom" autocomplete="referredToYouFrom" />
                                                        <x-jet-label class="ml-3" for="healthMedicalServicesReferredToYouFrom" value="{{ __('Health/Medical Services') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherReferredToYouFrom = false" id="socialServices" name="referredToYouFrom" value="Social Services" type="radio" class="block" wire:model.defer="referredToYouFrom" autocomplete="referredToYouFrom" />
                                                        <x-jet-label class="ml-3" for="socialServices" value="{{ __('Social Services') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherReferredToYouFrom = false" id="policeReferredToYouFrom" name="referredToYouFrom" value="Police" type="radio" class="block" wire:model.defer="referredToYouFrom" autocomplete="referredToYouFrom" />
                                                        <x-jet-label class="ml-3" for="policeReferredToYouFrom" value="{{ __('Police') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherReferredToYouFrom = false" id="legalAssistanceServicesReferredToYouFrom" name="referredToYouFrom" value="Legal Assistance Services" type="radio" class="block" wire:model.defer="referredToYouFrom" autocomplete="referredToYouFrom" />
                                                        <x-jet-label class="ml-3" for="legalAssistanceServicesReferredToYouFrom" value="{{ __('Legal Assistance Services') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherReferredToYouFrom = false" id="livelihoodsProgramReferredToYouFrom" name="referredToYouFrom" value="Livelihoods Program" type="radio" class="block" wire:model.defer="referredToYouFrom" autocomplete="referredToYouFrom" />
                                                        <x-jet-label class="ml-3" for="livelihoodsProgramReferredToYouFrom" value="{{ __('Livelihoods Program') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherReferredToYouFrom = false" id="schoolsWelfareUnitTeacherSchoolOfficial" name="referredToYouFrom" value="Schools Welfare Unit/ Teacher/School Official" type="radio" class="block" wire:model.defer="referredToYouFrom" autocomplete="referredToYouFrom" />
                                                        <x-jet-label class="ml-3" for="schoolsWelfareUnitTeacherSchoolOfficial" value="{{ __('Schools Welfare Unit/ Teacher/School Official') }}" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherReferredToYouFrom = false" id="communityReligiousLeaderGroups" name="referredToYouFrom" value="Community or Religious Leader/Groups" type="radio" class="block" wire:model.defer="referredToYouFrom" autocomplete="referredToYouFrom" />
                                                        <x-jet-label class="ml-3" for="communityReligiousLeaderGroups" value="{{ __('Community or Religious Leader/Groups') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherReferredToYouFrom = false" id="safeHouseShelterReferredToYouFrom" name="referredToYouFrom" value="Safe House/Shelter" type="radio" class="block" wire:model.defer="referredToYouFrom" autocomplete="referredToYouFrom" />
                                                        <x-jet-label class="ml-3" for="safeHouseShelterReferredToYouFrom" value="{{ __('Safe House/Shelter') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherReferredToYouFrom = false" id="otherHumanitarianDevelopmentActor" name="referredToYouFrom" value="Other Humanitarian or Development Actor" type="radio" class="block" wire:model.defer="referredToYouFrom" autocomplete="referredToYouFrom" />
                                                        <x-jet-label class="ml-3" for="otherHumanitarianDevelopmentActor" value="{{ __('Other Humanitarian or Development Actor') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherReferredToYouFrom = false" id="otherGovernmentServices" name="referredToYouFrom" value="Other Government Services" type="radio" class="block" wire:model.defer="referredToYouFrom" autocomplete="referredToYouFrom" />
                                                        <x-jet-label class="ml-3" for="otherGovernmentServices" value="{{ __('Other Government Services') }}" />
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <x-jet-input @click="otherReferredToYouFrom = true" id="otherReferredToYouFrom" name="referredToYouFrom" type="radio" class="block" autocomplete="referredToYouFrom" />
                                                        <x-jet-label class="ml-3" for="otherReferredToYouFrom" value="{{ __('Other (specify)') }}" />
                                                        <x-jet-input x-show="otherReferredToYouFrom" id="otherReferredToYouFrom" type="text" class="block w-full" wire:model.defer="referredToYouFrom" autocomplete="referredToYouFrom" />
                                                    </div>
                                                </div>
                                            </div>
                                            <x-jet-input-error for="referredToYouFrom" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div x-data="{ safeHouseShelter: false }" class="sm:flex block justify-between gap-4">
                                            <div class="w-full">
                                                <div class="mt-4">
                                                    <div class="mt-4 flex items-center gap-6">
                                                        <x-jet-label for="safeHouseShelter" value="{{ __('Did you refer the client to a safe shelter?') }}" />
                                                        <div class="flex items-center gap-6">
                                                            <div class="flex items-center">
                                                                <x-jet-input @click="safeHouseShelter = false" id="yesSafeHouseShelter" name="safeHouseShelter" value="Yes" type="radio" class="block" wire:model.defer="safeHouseShelter" autocomplete="safeHouseShelter" />
                                                                <x-jet-label class="ml-3" for="yesSafeHouseShelter" value="{{ __('Yes') }}" />
                                                            </div>
                                                            <div class="flex items-center">
                                                                <x-jet-input @click="safeHouseShelter = true" id="noSafeHouseShelter" name="safeHouseShelter" value="No" type="radio" class="block" autocomplete="safeHouseShelter" />
                                                                <x-jet-label class="ml-3" for="noSafeHouseShelter" value="{{ __('No') }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div x-show="safeHouseShelter" class="mt-4">
                                                        <div>
                                                            <x-jet-label for="ifNoSafeHouseShelter" value="{{ __('If ‘No’, why not?*') }}" />
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="safeHouseShelterServiceProvidedByYourAgency" name="safeHouseShelter" value="Service provided by your agency" type="radio" class="block" wire:model.defer="safeHouseShelter" autocomplete="safeHouseShelter" />
                                                                <x-jet-label class="ml-3" for="safeHouseShelterServiceProvidedByYourAgency" value="{{ __('Service provided by your agency') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="safeHouseShelterServicesAlreadyReceivedFromAnotherAgency" name="safeHouseShelter" value="Services already received from another agency" type="radio" class="block" wire:model.defer="safeHouseShelter" autocomplete="safeHouseShelter" />
                                                                <x-jet-label class="ml-3" for="safeHouseShelterServicesAlreadyReceivedFromAnotherAgency" value="{{ __('Services already received from another agency') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="safeHouseShelterServiceNotApplicable" name="safeHouseShelter" value="Service not applicable" type="radio" class="block" wire:model.defer="safeHouseShelter" autocomplete="safeHouseShelter" />
                                                                <x-jet-label class="ml-3" for="safeHouseShelterServiceNotApplicable" value="{{ __('Service not applicable') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="safeHouseShelterReferralDeclinedBySurvivor" name="safeHouseShelter" value="Referral declined by survivor" type="radio" class="block" wire:model.defer="safeHouseShelter" autocomplete="safeHouseShelter" />
                                                                <x-jet-label class="ml-3" for="safeHouseShelterReferralDeclinedBySurvivor" value="{{ __('Referral declined by survivor') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="safeHouseShelterServiceUnavailable" name="safeHouseShelter" value="Service unavailable" type="radio" class="block" wire:model.defer="safeHouseShelter" autocomplete="safeHouseShelter" />
                                                                <x-jet-label class="ml-3" for="safeHouseShelterServiceUnavailable" value="{{ __('Service unavailable') }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <x-jet-input-error for="safeHouseShelter" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="w-full">
                                                <div x-show="!safeHouseShelter" class="mt-4">
                                                    <x-jet-label for="safeHouseShelterReportedAppointmentDate" value="{{ __('Date reported or future appointment date (day/month/year) and Time:') }}" />
                                                    <x-jet-input id="safeHouseShelterReportedAppointmentDate" type="date" class="mt-1 block w-full" wire:model.defer="safeHouseShelterReportedAppointmentDate" autocomplete="safeHouseShelterReportedAppointmentDate" />
                                                    <x-jet-label for="safeHouseShelterNameLocation" value="{{ __('Name and Location') }}" />
                                                    <x-jet-input id="safeHouseShelterNameLocation" type="text" class="mt-1 block w-full" wire:model.defer="safeHouseShelterNameLocation" autocomplete="safeHouseShelterNameLocation" />
                                                    <x-jet-label for="safeHouseShelter" value="{{ __('Notes (including action taken or recommended action to be taken)') }}" />
                                                    <x-jet-input id="safeHouseShelterNotes" type="text" class="mt-1 block w-full" wire:model.defer="safeHouseShelterNotes" autocomplete="safeHouseShelterNotes" />
                                                    <x-jet-input-error for="safeHouseShelterNotes" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div x-data="{ healthMedicalServices: false }" class="sm:flex block justify-between gap-4">
                                            <div class="w-full">
                                                <div class="mt-4">
                                                    <div class="mt-4 flex items-center gap-6">
                                                        <x-jet-label for="healthMedicalServices" value="{{ __('Did you refer the client to health / medical services?') }}" />
                                                        <div class="flex items-center gap-6">
                                                            <div class="flex items-center">
                                                                <x-jet-input @click="healthMedicalServices = false" id="yesHealthMedicalServices" name="healthMedicalServices" value="Yes" type="radio" class="block" wire:model.defer="healthMedicalServices" autocomplete="healthMedicalServices" />
                                                                <x-jet-label class="ml-3" for="yesHealthMedicalServices" value="{{ __('Yes') }}" />
                                                            </div>
                                                            <div class="flex items-center">
                                                                <x-jet-input @click="healthMedicalServices = true" id="noHealthMedicalServices" name="healthMedicalServices" value="No" type="radio" class="block" autocomplete="healthMedicalServices" />
                                                                <x-jet-label class="ml-3" for="noHealthMedicalServices" value="{{ __('No') }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div x-show="healthMedicalServices" class="mt-4">
                                                        <div>
                                                            <x-jet-label for="ifNoHealthMedicalServices" value="{{ __('If ‘No’, why not?*') }}" />
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="healthMedicalServicesServiceProvidedByYourAgency" name="healthMedicalServices" value="Service provided by your agency" type="radio" class="block" wire:model.defer="healthMedicalServices" autocomplete="healthMedicalServices" />
                                                                <x-jet-label class="ml-3" for="healthMedicalServicesServiceProvidedByYourAgency" value="{{ __('Service provided by your agency') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="healthMedicalServicesServicesAlreadyReceivedFromAnotherAgency" name="healthMedicalServices" value="Services already received from another agency" type="radio" class="block" wire:model.defer="healthMedicalServices" autocomplete="healthMedicalServices" />
                                                                <x-jet-label class="ml-3" for="healthMedicalServicesServicesAlreadyReceivedFromAnotherAgency" value="{{ __('Services already received from another agency') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="healthMedicalServicesServiceNotApplicable" name="healthMedicalServices" value="Service not applicable" type="radio" class="block" wire:model.defer="healthMedicalServices" autocomplete="healthMedicalServices" />
                                                                <x-jet-label class="ml-3" for="healthMedicalServicesServiceNotApplicable" value="{{ __('Service not applicable') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="healthMedicalServicesReferralDeclinedBySurvivor" name="healthMedicalServices" value="Referral declined by survivor" type="radio" class="block" wire:model.defer="healthMedicalServices" autocomplete="healthMedicalServices" />
                                                                <x-jet-label class="ml-3" for="healthMedicalServicesReferralDeclinedBySurvivor" value="{{ __('Referral declined by survivor') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="healthMedicalServicesServiceUnavailable" name="healthMedicalServices" value="Service unavailable" type="radio" class="block" wire:model.defer="healthMedicalServices" autocomplete="healthMedicalServices" />
                                                                <x-jet-label class="ml-3" for="healthMedicalServicesServiceUnavailable" value="{{ __('Service unavailable') }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <x-jet-input-error for="healthMedicalServices" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="w-full">
                                                <div x-show="!healthMedicalServices" class="mt-4">
                                                    <x-jet-label for="healthMedicalServicesReportedAppointmentDate" value="{{ __('Date reported or future appointment date (day/month/year) and Time:') }}" />
                                                    <x-jet-input id="healthMedicalServicesReportedAppointmentDate" type="date" class="mt-1 block w-full" wire:model.defer="healthMedicalServicesReportedAppointmentDate" autocomplete="healthMedicalServicesReportedAppointmentDate" />
                                                    <div class="flex items-center mt-2 gap-4">
                                                        <div>
                                                            <x-jet-label for="healthMedicalServicesNameLocation" value="{{ __('Name and Location') }}" />
                                                            <x-jet-input id="healthMedicalServicesNameLocation" type="text" class="mt-1 block w-full" wire:model.defer="healthMedicalServicesNameLocation" autocomplete="healthMedicalServicesNameLocation" />
                                                        </div>
                                                        <div>
                                                            <x-jet-label for="healthMedicalServicesFollowUpAppointmentDate" value="{{ __('Follow-up Appointment Date and Time:') }}" />
                                                            <x-jet-input id="healthMedicalServicesFollowUpAppointmentDate" type="date" class="mt-1 block w-full" wire:model.defer="healthMedicalServicesFollowUpAppointmentDate" autocomplete="healthMedicalServicesFollowUpAppointmentDate" />
                                                        </div>

                                                    </div>
                                                    <x-jet-label for="healthMedicalServices" value="{{ __('Notes (including action taken or recommended action to be taken)') }}" />
                                                    <x-jet-input id="healthMedicalServicesNotes" type="text" class="mt-1 block w-full" wire:model.defer="healthMedicalServicesNotes" autocomplete="healthMedicalServicesNotes" />
                                                    <x-jet-input-error for="healthMedicalServicesNotes" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div x-data="{ psychosocialServices: false }" class="sm:flex block justify-between gap-4">
                                            <div class="w-full">
                                                <div class="mt-4">
                                                    <div class="mt-4 flex items-center gap-6">
                                                        <x-jet-label for="psychosocialServices" value="{{ __('Did you refer the client to psychosocial services?') }}" />
                                                        <div class="flex items-center gap-6">
                                                            <div class="flex items-center">
                                                                <x-jet-input @click="psychosocialServices = false" id="yesPsychosocialServices" name="psychosocialServices" value="Yes" type="radio" class="block" wire:model.defer="psychosocialServices" autocomplete="psychosocialServices" />
                                                                <x-jet-label class="ml-3" for="yesPsychosocialServices" value="{{ __('Yes') }}" />
                                                            </div>
                                                            <div class="flex items-center">
                                                                <x-jet-input @click="psychosocialServices = true" id="noPsychosocialServices" name="psychosocialServices" value="No" type="radio" class="block" autocomplete="psychosocialServices" />
                                                                <x-jet-label class="ml-3" for="noPsychosocialServices" value="{{ __('No') }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div x-show="psychosocialServices" class="mt-4">
                                                        <div>
                                                            <x-jet-label for="ifNoPsychosocialServices" value="{{ __('If ‘No’, why not?*') }}" />
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="psychosocialServicesServiceProvidedByYourAgency" name="psychosocialServices" value="Service provided by your agency" type="radio" class="block" wire:model.defer="psychosocialServices" autocomplete="psychosocialServices" />
                                                                <x-jet-label class="ml-3" for="psychosocialServicesServiceProvidedByYourAgency" value="{{ __('Service provided by your agency') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="psychosocialServicesServicesAlreadyReceivedFromAnotherAgency" name="psychosocialServices" value="Services already received from another agency" type="radio" class="block" wire:model.defer="psychosocialServices" autocomplete="psychosocialServices" />
                                                                <x-jet-label class="ml-3" for="psychosocialServicesServicesAlreadyReceivedFromAnotherAgency" value="{{ __('Services already received from another agency') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="psychosocialServicesServiceNotApplicable" name="psychosocialServices" value="Service not applicable" type="radio" class="block" wire:model.defer="psychosocialServices" autocomplete="psychosocialServices" />
                                                                <x-jet-label class="ml-3" for="psychosocialServicesServiceNotApplicable" value="{{ __('Service not applicable') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="psychosocialServicesReferralDeclinedBySurvivor" name="psychosocialServices" value="Referral declined by survivor" type="radio" class="block" wire:model.defer="psychosocialServices" autocomplete="psychosocialServices" />
                                                                <x-jet-label class="ml-3" for="psychosocialServicesReferralDeclinedBySurvivor" value="{{ __('Referral declined by survivor') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="psychosocialServicesServiceUnavailable" name="psychosocialServices" value="Service unavailable" type="radio" class="block" wire:model.defer="psychosocialServices" autocomplete="psychosocialServices" />
                                                                <x-jet-label class="ml-3" for="psychosocialServicesServiceUnavailable" value="{{ __('Service unavailable') }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <x-jet-input-error for="psychosocialServices" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="w-full">
                                                <div x-show="!psychosocialServices" class="mt-4">
                                                    <x-jet-label for="psychosocialServicesReportedAppointmentDate" value="{{ __('Date reported or future appointment date (day/month/year) and Time:') }}" />
                                                    <x-jet-input id="psychosocialServicesReportedAppointmentDate" type="date" class="mt-1 block w-full" wire:model.defer="psychosocialServicesReportedAppointmentDate" autocomplete="psychosocialServicesReportedAppointmentDate" />
                                                    <x-jet-label for="psychosocialServicesNameLocation" value="{{ __('Name and Location') }}" />
                                                    <x-jet-input id="psychosocialServicesNameLocation" type="text" class="mt-1 block w-full" wire:model.defer="psychosocialServicesNameLocation" autocomplete="psychosocialServicesNameLocation" />
                                                    <x-jet-label for="psychosocialServices" value="{{ __('Notes (including action taken or recommended action to be taken)') }}" />
                                                    <x-jet-input id="psychosocialServicesNotes" type="text" class="mt-1 block w-full" wire:model.defer="psychosocialServicesNotes" autocomplete="psychosocialServicesNotes" />
                                                    <x-jet-input-error for="psychosocialServicesNotes" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div>
                                            <div class="mt-4 flex items-center gap-6">
                                                <x-jet-label for="wantsLegalAction" value="{{ __('Does the client want to pursue legal action?') }}" />
                                                <div class="flex items-center gap-6">
                                                    <div class="flex items-center">
                                                        <x-jet-input id="yesWantsLegalAction" name="wantsLegalAction" value="Yes" type="radio" class="block" autocomplete="wantsLegalAction" />
                                                        <x-jet-label class="ml-3" for="yesWantsLegalAction" value="{{ __('Yes') }}" />
                                                    </div>
                                                    <div class="flex items-center">
                                                        <x-jet-input id="noWantsLegalAction" name="wantsLegalAction" value="No" type="radio" class="block" wire:model.defer="wantsLegalAction" autocomplete="wantsLegalAction" />
                                                        <x-jet-label class="ml-3" for="noWantsLegalAction" value="{{ __('No') }}" />
                                                    </div>
                                                    <div class="flex items-center">
                                                        <x-jet-input id="undecidedAtTimeOfReport" name="wantsLegalAction" value="Undecided at Time of Report" type="radio" class="block" wire:model.defer="wantsLegalAction" autocomplete="wantsLegalAction" />
                                                        <x-jet-label class="ml-3" for="undecidedAtTimeOfReport" value="{{ __('Undecided at Time of Report') }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <x-jet-input-error for="wantsLegalAction" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div x-data="{ legalAssistanceServices: false }" class="sm:flex block justify-between gap-4">
                                            <div class="w-full">
                                                <div class="mt-4">
                                                    <div class="mt-4 flex items-center gap-6">
                                                        <x-jet-label for="legalAssistanceServices" value="{{ __('Did you refer the client to legal assistance services?') }}" />
                                                        <div class="flex items-center gap-6">
                                                            <div class="flex items-center">
                                                                <x-jet-input @click="legalAssistanceServices = false" id="yesLegalAssistanceServices" name="legalAssistanceServices" value="Yes" type="radio" class="block" wire:model.defer="legalAssistanceServices" autocomplete="legalAssistanceServices" />
                                                                <x-jet-label class="ml-3" for="yesLegalAssistanceServices" value="{{ __('Yes') }}" />
                                                            </div>
                                                            <div class="flex items-center">
                                                                <x-jet-input @click="legalAssistanceServices = true" id="noLegalAssistanceServices" name="legalAssistanceServices" value="No" type="radio" class="block" autocomplete="legalAssistanceServices" />
                                                                <x-jet-label class="ml-3" for="noLegalAssistanceServices" value="{{ __('No') }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div x-show="legalAssistanceServices" class="mt-4">
                                                        <div>
                                                            <x-jet-label for="ifNoLegalAssistanceServices" value="{{ __('If ‘No’, why not?*') }}" />
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="legalAssistanceServicesServiceProvidedByYourAgency" name="legalAssistanceServices" value="Service provided by your agency" type="radio" class="block" wire:model.defer="legalAssistanceServices" autocomplete="legalAssistanceServices" />
                                                                <x-jet-label class="ml-3" for="legalAssistanceServicesServiceProvidedByYourAgency" value="{{ __('Service provided by your agency') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="legalAssistanceServicesServicesAlreadyReceivedFromAnotherAgency" name="legalAssistanceServices" value="Services already received from another agency" type="radio" class="block" wire:model.defer="legalAssistanceServices" autocomplete="legalAssistanceServices" />
                                                                <x-jet-label class="ml-3" for="legalAssistanceServicesServicesAlreadyReceivedFromAnotherAgency" value="{{ __('Services already received from another agency') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="legalAssistanceServicesServiceNotApplicable" name="legalAssistanceServices" value="Service not applicable" type="radio" class="block" wire:model.defer="legalAssistanceServices" autocomplete="legalAssistanceServices" />
                                                                <x-jet-label class="ml-3" for="legalAssistanceServicesServiceNotApplicable" value="{{ __('Service not applicable') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="legalAssistanceServicesReferralDeclinedBySurvivor" name="legalAssistanceServices" value="Referral declined by survivor" type="radio" class="block" wire:model.defer="legalAssistanceServices" autocomplete="legalAssistanceServices" />
                                                                <x-jet-label class="ml-3" for="legalAssistanceServicesReferralDeclinedBySurvivor" value="{{ __('Referral declined by survivor') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="legalAssistanceServicesServiceUnavailable" name="legalAssistanceServices" value="Service unavailable" type="radio" class="block" wire:model.defer="legalAssistanceServices" autocomplete="legalAssistanceServices" />
                                                                <x-jet-label class="ml-3" for="legalAssistanceServicesServiceUnavailable" value="{{ __('Service unavailable') }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <x-jet-input-error for="legalAssistanceServices" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="w-full">
                                                <div x-show="!legalAssistanceServices" class="mt-4">
                                                    <x-jet-label for="legalAssistanceServicesReportedAppointmentDate" value="{{ __('Date reported or future appointment date (day/month/year) and Time:') }}" />
                                                    <x-jet-input id="legalAssistanceServicesReportedAppointmentDate" type="date" class="mt-1 block w-full" wire:model.defer="legalAssistanceServicesReportedAppointmentDate" autocomplete="legalAssistanceServicesReportedAppointmentDate" />
                                                    <x-jet-label for="legalAssistanceServicesNameLocation" value="{{ __('Name and Location') }}" />
                                                    <x-jet-input id="legalAssistanceServicesNameLocation" type="text" class="mt-1 block w-full" wire:model.defer="legalAssistanceServicesNameLocation" autocomplete="legalAssistanceServicesNameLocation" />
                                                    <x-jet-label for="legalAssistanceServices" value="{{ __('Notes (including action taken or recommended action to be taken)') }}" />
                                                    <x-jet-input id="legalAssistanceServicesNotes" type="text" class="mt-1 block w-full" wire:model.defer="legalAssistanceServicesNotes" autocomplete="legalAssistanceServicesNotes" />
                                                    <x-jet-input-error for="legalAssistanceServicesNotes" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div x-data="{ policeOtherSecurityActor: false }" class="sm:flex block justify-between gap-4">
                                            <div class="w-full">
                                                <div class="mt-4">
                                                    <div class="mt-4 flex items-center gap-6">
                                                        <x-jet-label for="policeOtherSecurityActor" value="{{ __('Did you refer the client to the police or other type of security actor?') }}" />
                                                        <div class="flex items-center gap-6">
                                                            <div class="flex items-center">
                                                                <x-jet-input @click="policeOtherSecurityActor = false" id="yesPoliceOtherSecurityActor" name="policeOtherSecurityActor" value="Yes" type="radio" class="block" wire:model.defer="policeOtherSecurityActor" autocomplete="policeOtherSecurityActor" />
                                                                <x-jet-label class="ml-3" for="yesPoliceOtherSecurityActor" value="{{ __('Yes') }}" />
                                                            </div>
                                                            <div class="flex items-center">
                                                                <x-jet-input @click="policeOtherSecurityActor = true" id="noPoliceOtherSecurityActor" name="policeOtherSecurityActor" value="No" type="radio" class="block" autocomplete="policeOtherSecurityActor" />
                                                                <x-jet-label class="ml-3" for="noPoliceOtherSecurityActor" value="{{ __('No') }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div x-show="policeOtherSecurityActor" class="mt-4">
                                                        <div>
                                                            <x-jet-label for="ifNoPoliceOtherSecurityActor" value="{{ __('If ‘No’, why not?*') }}" />
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="policeOtherSecurityActorServiceProvidedByYourAgency" name="policeOtherSecurityActor" value="Service provided by your agency" type="radio" class="block" wire:model.defer="policeOtherSecurityActor" autocomplete="policeOtherSecurityActor" />
                                                                <x-jet-label class="ml-3" for="policeOtherSecurityActorServiceProvidedByYourAgency" value="{{ __('Service provided by your agency') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="policeOtherSecurityActorServicesAlreadyReceivedFromAnotherAgency" name="policeOtherSecurityActor" value="Services already received from another agency" type="radio" class="block" wire:model.defer="policeOtherSecurityActor" autocomplete="policeOtherSecurityActor" />
                                                                <x-jet-label class="ml-3" for="policeOtherSecurityActorServicesAlreadyReceivedFromAnotherAgency" value="{{ __('Services already received from another agency') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="policeOtherSecurityActorServiceNotApplicable" name="policeOtherSecurityActor" value="Service not applicable" type="radio" class="block" wire:model.defer="policeOtherSecurityActor" autocomplete="policeOtherSecurityActor" />
                                                                <x-jet-label class="ml-3" for="policeOtherSecurityActorServiceNotApplicable" value="{{ __('Service not applicable') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="policeOtherSecurityActorReferralDeclinedBySurvivor" name="policeOtherSecurityActor" value="Referral declined by survivor" type="radio" class="block" wire:model.defer="policeOtherSecurityActor" autocomplete="policeOtherSecurityActor" />
                                                                <x-jet-label class="ml-3" for="policeOtherSecurityActorReferralDeclinedBySurvivor" value="{{ __('Referral declined by survivor') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="policeOtherSecurityActorServiceUnavailable" name="policeOtherSecurityActor" value="Service unavailable" type="radio" class="block" wire:model.defer="policeOtherSecurityActor" autocomplete="policeOtherSecurityActor" />
                                                                <x-jet-label class="ml-3" for="policeOtherSecurityActorServiceUnavailable" value="{{ __('Service unavailable') }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <x-jet-input-error for="policeOtherSecurityActor" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="w-full">
                                                <div x-show="!policeOtherSecurityActor" class="mt-4">
                                                    <x-jet-label for="policeOtherSecurityActorReportedAppointmentDate" value="{{ __('Date reported or future appointment date (day/month/year) and Time:') }}" />
                                                    <x-jet-input id="policeOtherSecurityActorReportedAppointmentDate" type="date" class="mt-1 block w-full" wire:model.defer="policeOtherSecurityActorReportedAppointmentDate" autocomplete="policeOtherSecurityActorReportedAppointmentDate" />
                                                    <x-jet-label for="policeOtherSecurityActorNameLocation" value="{{ __('Name and Location') }}" />
                                                    <x-jet-input id="policeOtherSecurityActorNameLocation" type="text" class="mt-1 block w-full" wire:model.defer="policeOtherSecurityActorNameLocation" autocomplete="policeOtherSecurityActorNameLocation" />
                                                    <x-jet-label for="policeOtherSecurityActor" value="{{ __('Notes (including action taken or recommended action to be taken)') }}" />
                                                    <x-jet-input id="policeOtherSecurityActorNotes" type="text" class="mt-1 block w-full" wire:model.defer="policeOtherSecurityActorNotes" autocomplete="policeOtherSecurityActorNotes" />
                                                    <x-jet-input-error for="policeOtherSecurityActorNotes" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div x-data="{ livelihoodsProgram: false }" class="sm:flex block justify-between gap-4">
                                            <div class="w-full">
                                                <div class="mt-4">
                                                    <div class="mt-4 flex items-center gap-6">
                                                        <x-jet-label for="livelihoodsProgram" value="{{ __('Did you refer the client to a livelihoods program?') }}" />
                                                        <div class="flex items-center gap-6">
                                                            <div class="flex items-center">
                                                                <x-jet-input @click="livelihoodsProgram = false" id="yesLivelihoodsProgram" name="livelihoodsProgram" value="Yes" type="radio" class="block" wire:model.defer="livelihoodsProgram" autocomplete="livelihoodsProgram" />
                                                                <x-jet-label class="ml-3" for="yesLivelihoodsProgram" value="{{ __('Yes') }}" />
                                                            </div>
                                                            <div class="flex items-center">
                                                                <x-jet-input @click="livelihoodsProgram = true" id="noLivelihoodsProgram" name="livelihoodsProgram" value="No" type="radio" class="block" autocomplete="livelihoodsProgram" />
                                                                <x-jet-label class="ml-3" for="noLivelihoodsProgram" value="{{ __('No') }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div x-show="livelihoodsProgram" class="mt-4">
                                                        <div>
                                                            <x-jet-label for="ifNoLivelihoodsProgram" value="{{ __('If ‘No’, why not?*') }}" />
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="livelihoodsProgramServiceProvidedByYourAgency" name="livelihoodsProgram" value="Service provided by your agency" type="radio" class="block" wire:model.defer="livelihoodsProgram" autocomplete="livelihoodsProgram" />
                                                                <x-jet-label class="ml-3" for="livelihoodsProgramServiceProvidedByYourAgency" value="{{ __('Service provided by your agency') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="livelihoodsProgramServicesAlreadyReceivedFromAnotherAgency" name="livelihoodsProgram" value="Services already received from another agency" type="radio" class="block" wire:model.defer="livelihoodsProgram" autocomplete="livelihoodsProgram" />
                                                                <x-jet-label class="ml-3" for="livelihoodsProgramServicesAlreadyReceivedFromAnotherAgency" value="{{ __('Services already received from another agency') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="livelihoodsProgramServiceNotApplicable" name="livelihoodsProgram" value="Service not applicable" type="radio" class="block" wire:model.defer="livelihoodsProgram" autocomplete="livelihoodsProgram" />
                                                                <x-jet-label class="ml-3" for="livelihoodsProgramServiceNotApplicable" value="{{ __('Service not applicable') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="livelihoodsProgramReferralDeclinedBySurvivor" name="livelihoodsProgram" value="Referral declined by survivor" type="radio" class="block" wire:model.defer="livelihoodsProgram" autocomplete="livelihoodsProgram" />
                                                                <x-jet-label class="ml-3" for="livelihoodsProgramReferralDeclinedBySurvivor" value="{{ __('Referral declined by survivor') }}" />
                                                            </div>
                                                            <div class="flex items-center mt-2">
                                                                <x-jet-input id="livelihoodsProgramServiceUnavailable" name="livelihoodsProgram" value="Service unavailable" type="radio" class="block" wire:model.defer="livelihoodsProgram" autocomplete="livelihoodsProgram" />
                                                                <x-jet-label class="ml-3" for="livelihoodsProgramServiceUnavailable" value="{{ __('Service unavailable') }}" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <x-jet-input-error for="livelihoodsProgram" class="mt-2" />
                                                </div>
                                            </div>

                                            <div class="w-full">
                                                <div x-show="!livelihoodsProgram" class="mt-4">
                                                    <x-jet-label for="livelihoodsProgramReportedAppointmentDate" value="{{ __('Date reported or future appointment date (day/month/year) and Time:') }}" />
                                                    <x-jet-input id="livelihoodsProgramReportedAppointmentDate" type="date" class="mt-1 block w-full" wire:model.defer="livelihoodsProgramReportedAppointmentDate" autocomplete="livelihoodsProgramReportedAppointmentDate" />
                                                    <x-jet-label for="livelihoodsProgramNameLocation" value="{{ __('Name and Location') }}" />
                                                    <x-jet-input id="livelihoodsProgramNameLocation" type="text" class="mt-1 block w-full" wire:model.defer="livelihoodsProgramNameLocation" autocomplete="livelihoodsProgramNameLocation" />
                                                    <x-jet-label for="livelihoodsProgram" value="{{ __('Notes (including action taken or recommended action to be taken)') }}" />
                                                    <x-jet-input id="livelihoodsProgramNotes" type="text" class="mt-1 block w-full" wire:model.defer="livelihoodsProgramNotes" autocomplete="livelihoodsProgramNotes" />
                                                    <x-jet-input-error for="livelihoodsProgramNotes" class="mt-2" />
                                                </div>
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div class="sm:flex block justify-between gap-4">
                                            <div class="w-full">
                                                <x-jet-label for="emotionalStateAtBeginning" value="{{ __('Describe the emotional state of the client at the beginning of the interview:') }}" />
                                                <textarea wire:model.defer="emotionalStateAtBeginning" id="emotionalStateAtBeginning" name="emotionalStateAtBeginning" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                                                <x-jet-input-error for="emotionalStateAtBeginning" class="mt-2" />
                                            </div>

                                            <div class="w-full">
                                                <x-jet-label for="emotionalStateAtEnd" value="{{ __('Describe the emotional state of the client at the end of the interview:') }}" />

                                                <textarea wire:model.defer="emotionalStateAtEnd" id="emotionalStateAtEnd" name="emotionalStateAtEnd" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                                                <x-jet-input-error for="emotionalStateAtEnd" class="mt-2" />
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div class="sm:flex block justify-between gap-4">
                                            <div class="w-full" x-data="{ safeWhenLeaves: false }">
                                                <div class="flex items-center gap-6">
                                                    <x-jet-label for="safeWhenLeaves" value="{{ __('Will the client be safe when she or he leaves?') }}" />
                                                    <div class="flex items-center gap-6">
                                                        <div class="flex items-center">
                                                            <x-jet-input @click="safeWhenLeaves = false" id="yesSafeWhenLeaves" name="safeWhenLeaves" value="Yes" type="radio" class="block" wire:model.defer="safeWhenLeaves" autocomplete="safeWhenLeaves" />
                                                            <x-jet-label class="ml-3" for="yesSafeWhenLeaves" value="{{ __('Yes') }}" />
                                                        </div>
                                                        <div class="flex items-center">
                                                            <x-jet-input @click="safeWhenLeaves = true" id="noSafeWhenLeaves" name="safeWhenLeaves" value="No" type="radio" class="block" autocomplete="safeWhenLeaves" />
                                                            <x-jet-label class="ml-3" for="noSafeWhenLeaves" value="{{ __('No') }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div x-show="safeWhenLeaves" class="mt-4">
                                                    <div class="mt-4">
                                                        <x-jet-label for="noSafeWhenLeaves" value="{{ __('If yes, include a brief description') }}" />
                                                        <textarea wire:model.defer="safeWhenLeaves" id="noSafeWhenLeaves" name="noSafeWhenLeaves" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                                                        <x-jet-input-error for="noSafeWhenLeaves" class="mt-2" />
                                                    </div>
                                                </div>
                                                <x-jet-input-error for="noSafeWhenLeaves" class="mt-2" />
                                            </div>
                                            <div class="w-full">
                                                <x-jet-label for="whoGiveEmotionalSupport" value="{{ __('Who will give the client emotional support?') }}" />
                                                <textarea wire:model.defer="whoGiveEmotionalSupport" id="whoGiveEmotionalSupport" name="whoGiveEmotionalSupport" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                                                <x-jet-input-error for="whoGiveEmotionalSupport" class="mt-2" />
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div class="sm:flex block justify-between gap-4">
                                            <div class="w-full">
                                                <x-jet-label for="actionsTakenSafety" value="{{ __('What actions were taken to ensure client’s safety?') }}" />

                                                <textarea wire:model.defer="actionsTakenSafety" id="actionsTakenSafety" name="actionsTakenSafety" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                                                <x-jet-input-error for="actionsTakenSafety" class="mt-2" />
                                            </div>

                                            <div class="w-full">
                                                <x-jet-label for="otherRelevantInformation" value="{{ __('Other relevant information') }}" />

                                                <textarea wire:model.defer="otherRelevantInformation" id="otherRelevantInformation" name="otherRelevantInformation" rows="3" class="block mt-1 w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"></textarea>
                                                <x-jet-input-error for="otherRelevantInformation" class="mt-2" />
                                            </div>
                                        </div>
                                        <x-jet-section-border />

                                        <div class="flex items-center gap-6">
                                            <x-jet-label for="explainedConsequencesOfRapeClient" value="{{ __('If raped, have you explained the possible consequences of rape to the client (if over 14 years of age)?') }}" />
                                            <div class="flex items-center gap-6">
                                                <div class="flex items-center">
                                                    <x-jet-input id="yesExplainedConsequencesOfRapeClient" name="explainedConsequencesOfRapeClient" value="Yes" type="radio" class="block" wire:model.defer="explainedConsequencesOfRapeClient" autocomplete="explainedConsequencesOfRapeClient" />
                                                    <x-jet-label class="ml-3" for="yesExplainedConsequencesOfRapeClient" value="{{ __('Yes') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="noExplainedConsequencesOfRapeClient" name="explainedConsequencesOfRapeClient" value="No" type="radio" class="block" wire:model.defer="explainedConsequencesOfRapeClient" autocomplete="explainedConsequencesOfRapeClient" />
                                                    <x-jet-label class="ml-3" for="noExplainedConsequencesOfRapeClient" value="{{ __('No') }}" />
                                                </div>
                                            </div>
                                            <x-jet-input-error for="explainedConsequencesOfRapeClient" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div class="flex items-center gap-6">
                                            <x-jet-label for="explainedConsequencesOfRapeCaregiver" value="{{ __('Have you explained the possible consequences of rape to the client’s caregiver (if the client is under the age of 14)?') }}" />
                                            <div class="flex items-center gap-6">
                                                <div class="flex items-center">
                                                    <x-jet-input id="yesExplainedConsequencesOfRapeCaregiver" name="explainedConsequencesOfRapeCaregiver" value="Yes" type="radio" class="block" wire:model.defer="explainedConsequencesOfRapeCaregiver" autocomplete="explainedConsequencesOfRapeCaregiver" />
                                                    <x-jet-label class="ml-3" for="yesExplainedConsequencesOfRapeCaregiver" value="{{ __('Yes') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="noExplainedConsequencesOfRapeCaregiver" name="explainedConsequencesOfRapeCaregiver" value="No" type="radio" class="block" wire:model.defer="explainedConsequencesOfRapeCaregiver" autocomplete="explainedConsequencesOfRapeCaregiver" />
                                                    <x-jet-label class="ml-3" for="noExplainedConsequencesOfRapeCaregiver" value="{{ __('No') }}" />
                                                </div>
                                            </div>
                                            <x-jet-input-error for="explainedConsequencesOfRapeCaregiver" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div class="flex items-center gap-6">
                                            <x-jet-label for="consentGivenForInformationSharing" value="{{ __('Did the client give their consent to share their non-identifiable in your reports?') }}" />
                                            <div class="flex items-center gap-6">
                                                <div class="flex items-center">
                                                    <x-jet-input id="yesConsentGivenForInformationSharing" name="consentGivenForInformationSharing" value="Yes" type="radio" class="block" wire:model.defer="consentGivenForInformationSharing" autocomplete="consentGivenForInformationSharing" />
                                                    <x-jet-label class="ml-3" for="yesConsentGivenForInformationSharing" value="{{ __('Yes') }}" />
                                                </div>
                                                <div class="flex items-center">
                                                    <x-jet-input id="noConsentGivenForInformationSharing" name="consentGivenForInformationSharing" value="No" type="radio" class="block" wire:model.defer="consentGivenForInformationSharing" autocomplete="consentGivenForInformationSharing" />
                                                    <x-jet-label class="ml-3" for="noConsentGivenForInformationSharing" value="{{ __('No') }}" />
                                                </div>
                                            </div>
                                            <x-jet-input-error for="consentGivenForInformationSharing" class="mt-2" />
                                        </div>
                                        <x-jet-section-border />

                                        <div class="sm:flex block items-center justify-end mb-4">
                                            <x-jet-button wire:click.prevent="store()" class="ml-4">
                                                {{ __('Save') }}
                                            </x-jet-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- content end --}}
        </div>
    </div>
    {{-- modal --}}
</div>
