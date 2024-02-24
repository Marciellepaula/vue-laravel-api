import CourseListItem from "./CourseListItem.vue";
import { __VLS_internalComponent, __VLS_componentsOption, __VLS_name, result } from "./CourseList.vue";

function __VLS_template() {
let __VLS_ctx!: InstanceType<__VLS_PickNotAny<typeof __VLS_internalComponent, new () => {}>> & {};
/* Components */
let __VLS_otherComponents!: NonNullable<typeof __VLS_internalComponent extends { components: infer C; } ? C : {}> & typeof __VLS_componentsOption;
let __VLS_own!: __VLS_SelfComponent<typeof __VLS_name, typeof __VLS_internalComponent & (new () => { $slots: typeof __VLS_slots; })>;
let __VLS_localComponents!: typeof __VLS_otherComponents & Omit<typeof __VLS_own, keyof typeof __VLS_otherComponents>;
let __VLS_components!: typeof __VLS_localComponents & __VLS_GlobalComponents & typeof __VLS_ctx;
/* Style Scoped */
type __VLS_StyleScopedClasses = {};
let __VLS_styleScopedClasses!: __VLS_StyleScopedClasses | keyof __VLS_StyleScopedClasses | (keyof __VLS_StyleScopedClasses)[];
/* CSS variable injection */
/* CSS variable injection end */
let __VLS_resolvedLocalAndGlobalComponents!: {} &
__VLS_WithComponent<'CourseListItem', typeof __VLS_localComponents, "CourseListItem", "CourseListItem", "CourseListItem">;
__VLS_intrinsicElements.h1; __VLS_intrinsicElements.h1;
__VLS_intrinsicElements.ul; __VLS_intrinsicElements.ul;
__VLS_components.CourseListItem;
// @ts-ignore
[CourseListItem,];
{
const __VLS_0 = __VLS_intrinsicElements["h1"];
const __VLS_1 = __VLS_elementAsFunctionalComponent(__VLS_0);
const __VLS_2 = __VLS_1({ ...{}, }, ...__VLS_functionalComponentArgsRest(__VLS_1));
({} as (props: __VLS_FunctionalComponentProps<typeof __VLS_0, typeof __VLS_2> & Record<string, unknown>) => void)({ ...{}, });
const __VLS_3 = __VLS_pickFunctionalComponentCtx(__VLS_0, __VLS_2)!;
let __VLS_4!: __VLS_NormalizeEmits<typeof __VLS_3.emit>;
(__VLS_3.slots!).default;
}
{
const __VLS_5 = __VLS_intrinsicElements["ul"];
const __VLS_6 = __VLS_elementAsFunctionalComponent(__VLS_5);
const __VLS_7 = __VLS_6({ ...{}, class: ("mt-3 list-group"), }, ...__VLS_functionalComponentArgsRest(__VLS_6));
({} as (props: __VLS_FunctionalComponentProps<typeof __VLS_5, typeof __VLS_7> & Record<string, unknown>) => void)({ ...{}, class: ("mt-3 list-group"), });
const __VLS_8 = __VLS_pickFunctionalComponentCtx(__VLS_5, __VLS_7)!;
let __VLS_9!: __VLS_NormalizeEmits<typeof __VLS_8.emit>;
for (const [courses] of __VLS_getVForSourceType((__VLS_ctx.result)!)) {
{
const __VLS_10 = ({} as 'CourseListItem' extends keyof typeof __VLS_ctx ? { 'CourseListItem': typeof __VLS_ctx.CourseListItem; } : typeof __VLS_resolvedLocalAndGlobalComponents).CourseListItem;
const __VLS_11 = __VLS_asFunctionalComponent(__VLS_10, new __VLS_10({ ...{}, key: ((__VLS_ctx.course.id)), course: ((courses)), }));
({} as { CourseListItem: typeof __VLS_10; }).CourseListItem;
const __VLS_12 = __VLS_11({ ...{}, key: ((__VLS_ctx.course.id)), course: ((courses)), }, ...__VLS_functionalComponentArgsRest(__VLS_11));
({} as (props: __VLS_FunctionalComponentProps<typeof __VLS_10, typeof __VLS_12> & Record<string, unknown>) => void)({ ...{}, key: ((__VLS_ctx.course.id)), course: ((courses)), });
const __VLS_13 = __VLS_pickFunctionalComponentCtx(__VLS_10, __VLS_12)!;
let __VLS_14!: __VLS_NormalizeEmits<typeof __VLS_13.emit>;
}
// @ts-ignore
[result, course, course, course,];
}
(__VLS_8.slots!).default;
}
if (typeof __VLS_styleScopedClasses === 'object' && !Array.isArray(__VLS_styleScopedClasses)) {
}
var __VLS_slots!: {};
return __VLS_slots;
}
